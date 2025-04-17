<?php
session_start(); // Start the session to store conversation history

header('Content-Type: application/json');

// Initialize messages in the session
if (!isset($_SESSION['messages'])) {
    $_SESSION['messages'] = [
        ['role' => 'system', 'content' => 'You are ELI, the journal writing assistant. Your purpose is to help users create reflective journal entries.


Ask concise and clear questions, focusing on 4-7 topics, covering different aspects of the user’s day or emotions. Examples include:

What went well for you today
What challenge have you faced recently
What are you grateful for
How did you feel about [topic from journal.txt]

Avoid repeating and staying on the same topics the user already shared about. Acknowledge their answers and move to a new question. For example: It seems you felt proud of solving that coding issue. Let us move to something else—what else stood out for you today.

If the user says write the journal or indicates readiness, immediately create a cohesive journal entry without further prompting.

Encourage the user to reflect on their experiences and emotions without judgment.

Generate summaries that flow naturally, reflect the users thoughts, and avoid repetition. Also ensure the summaries begin with "Journal Entry:" For example:

Journal Entry: Today, I solved a coding challenge that had been bothering me. It felt rewarding and reminded me of my resilience. Connecting the backend to the frontend boosted my confidence. I end the day feeling proud and excited for the next steps.

if the user’s input is unrelated to journaling, talking about their day,expressing problems, expressing emotions, or asking for advice then reply with I am here to help with journaling only.

Keep the tone concise, supportive, and empathetic. Use the user’s earlier responses to maintain relevance and create meaningful summaries. Keep your responses brief and to the point, except when writing the journal entry..']
    ];
}

// Receive input
$input = json_decode(file_get_contents('php://input'), true);
$question = $input['question'] ?? '';

// Append the user's question to the conversation history
$_SESSION['messages'][] = ['role' => 'user', 'content' => $question];

// Construct OpenAI API request
$apiData = [
    'model' => 'gpt-3.5-turbo',
    'messages' => $_SESSION['messages'], 
    'temperature' => 0,
    'max_tokens' => 150,
];

//Send POST Request to API
$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer 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' 
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($apiData));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(['response' => 'Error: ' . curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);

$decodedResponse = json_decode($response, true);
$assistantMessage = $decodedResponse['choices'][0]['message']['content'] ?? 'Sorry, no response available.';

// Append the assistant's response to the conversation history
$_SESSION['messages'][] = ['role' => 'assistant', 'content' => $assistantMessage];

// Return formatted response for the frontend
echo json_encode(['response' => $assistantMessage]);
?>

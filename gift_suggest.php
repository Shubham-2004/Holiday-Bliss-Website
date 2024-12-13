<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gift Suggestion</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1b1b1b;
            color: #eaeaea;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            padding: 30px;
            text-align: center;
            border-bottom: 2px solid #00bfae;
        }
        h1 {
            color: #00bfae;
            font-size: 2.5rem;
            margin: 0;
        }
        form {
            padding: 30px;
            margin: 50px auto;
            max-width: 700px;
            background-color: #2b2b2b;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            font-size: 1.1rem;
            color: #f5f5f5;
            margin-bottom: 8px;
            display: block;
        }
        input[type="text"], textarea {
            padding: 12px;
            margin: 8px 0;
            width: 100%;
            border: 1px solid #444;
            background-color: #333;
            color: #eaeaea;
            border-radius: 6px;
            font-size: 1rem;
        }
        textarea {
            height: 100px;
        }
        button {
            background-color: #00bfae;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 1.2rem;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #009c8e;
        }
        #gift-response {
            padding: 20px;
            margin: 30px auto;
            max-width: 700px;
            background-color: #444;
            border-radius: 10px;
            text-align: center;
            display: none;
        }
        #gift-response h2 {
            margin-top: 0;
            color: #00bfae;
        }
    </style>
</head>
<body>

<header>
    <h1>Gift Suggestion</h1>
</header>

<!-- Gift Suggestion Form -->
<form id="gift-form">
    <div class="form-group">
        <label for="occasion">Occasion:</label>
        <input type="text" id="occasion" name="occasion" placeholder="Enter the occasion (e.g., Birthday, Anniversary)" required>
    </div>

    <div class="form-group">
        <label for="person">Person (e.g., Friend, Parent, Partner):</label>
        <input type="text" id="person" name="person" placeholder="Who is the gift for?" required>
    </div>

    <div class="form-group">
        <label for="preferences">Preferences:</label>
        <textarea id="preferences" name="preferences" placeholder="Enter any preferences or hobbies (e.g., loves books, enjoys cooking)"></textarea>
    </div>

    <button type="submit">Get Suggestions</button>
</form>

<!-- Response Container -->
<div id="gift-response"></div>

<script>
    // Handle form submission
    document.getElementById('gift-form').addEventListener('submit', function (event) {
        event.preventDefault();

        // Get the form data
        const occasion = document.getElementById('occasion').value;
        const person = document.getElementById('person').value;
        const preferences = document.getElementById('preferences').value;

        // Validate the form data
        if (!occasion || !person) {
            alert('Please fill in all required fields.');
            return;
        }

        // Prepare the data for the backend
        const userMessage = `Suggest me gift ideas for a ${occasion} for a ${person}. Preferences: ${preferences}`;

        const data = JSON.stringify({
            messages: [
                {
                    role: 'user',
                    content: userMessage
                }
            ],
            model: 'gpt-4',
            max_tokens: 80,
            temperature: 0.7
        });

        const xhr = new XMLHttpRequest();
        xhr.withCredentials = true;

        xhr.addEventListener('readystatechange', function () {
            if (this.readyState === this.DONE) {
                try {
                    const response = JSON.parse(this.responseText);
                    const giftResponse = document.getElementById('gift-response');
                    if (response.choices && response.choices[0] && response.choices[0].message) {
                        const suggestions = response.choices[0].message.content.split('\n').map(item => `<li>${item}</li>`).join('');
                        giftResponse.innerHTML = `
                            <h2>Gift Suggestions</h2>
                            <ul>${suggestions}</ul>
                        `;
                        giftResponse.style.display = 'block';
                    } else {
                        alert('Error: Invalid response from the API.');
                        giftResponse.innerHTML = '<p>Error: No valid response received.</p>';
                    }
                } catch (error) {
                    alert('Error processing the response.');
                    console.error('Error:', error);
                }
            }
        });

        xhr.open('POST', 'https://cheapest-gpt-4-turbo-gpt-4-vision-chatgpt-openai-ai-api.p.rapidapi.com/v1/chat/completions');
        xhr.setRequestHeader('x-rapidapi-key', 'e7121962b2msh2a58b51138d956cp19c876jsnd1a3102e7d27');
        xhr.setRequestHeader('x-rapidapi-host', 'cheapest-gpt-4-turbo-gpt-4-vision-chatgpt-openai-ai-api.p.rapidapi.com');
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.send(data);
    });
</script>

</body>
</html>

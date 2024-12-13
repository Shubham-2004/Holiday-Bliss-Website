<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Trip Generator</title>

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
        input[type="text"], input[type="date"], select, textarea {
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
        .form-group {
            margin-bottom: 20px;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .form-row > div {
            flex: 1;
        }
        .form-row > div:last-child {
            flex: 1.5;
        }
        #trip-response {
            padding: 20px;
            margin: 30px auto;
            max-width: 700px;
            background-color: #444;
            border-radius: 10px;
            text-align: center;
            display: none;
        }
        #trip-response h2 {
            margin-top: 0;
            color: #00bfae;
        }
    </style>
</head>
<body>

<header>
    <h1>AI Trip Generator</h1>
</header>

<!-- Trip Form -->
<form id="trip-form">
    <div class="form-group">
        <label for="state">State:</label>
        <input type="text" id="state" name="state" placeholder="Enter the state" required>
    </div>

    <div class="form-group">
        <label for="city">City:</label>
        <input type="text" id="city" name="city" placeholder="Enter the city" required>
    </div>

    <div class="form-row">
        <div>
            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date" name="start-date" required>
        </div>
        <div>
            <label for="end-date">End Date:</label>
            <input type="date" id="end-date" name="end-date" required>
        </div>
    </div>

    <div class="form-group">
        <label for="holiday-tags">Holiday Tags:</label>
        <select id="holiday-tags" name="tags[]" multiple required>
            <option value="beach">Beach</option>
            <option value="adventure">Adventure</option>
            <option value="romantic">Romantic</option>
            <option value="family">Family</option>
            <option value="nature">Nature</option>
        </select>
    </div>

    <div class="form-group">
        <label for="budget">Budget ($):</label>
        <input type="text" id="budget" name="budget" placeholder="Enter your budget" required>
    </div>

    <div class="form-group">
        <label for="preferences">Additional Preferences:</label>
        <textarea id="preferences" name="preferences" placeholder="Enter any preferences, like hotel, activities, etc."></textarea>
    </div>

    <button type="submit">Generate Trip</button>
</form>

<!-- Response Container -->
<div id="trip-response"></div>

<script>
    // Handle form submission
    document.getElementById('trip-form').addEventListener('submit', function (event) {
        event.preventDefault();

        // Get the form data
        const state = document.getElementById('state').value;
        const city = document.getElementById('city').value;
        const startDate = document.getElementById('start-date').value;
        const endDate = document.getElementById('end-date').value;
        const tags = Array.from(document.getElementById('holiday-tags').selectedOptions).map(option => option.value);
        const budget = document.getElementById('budget').value;
        const preferences = document.getElementById('preferences').value;

        // Validate the form data
        if (!state || !city || !startDate || !endDate || tags.length === 0 || !budget) {
            alert('Please fill in all fields correctly.');
            return;
        }

        // Prepare the data for the backend
        const userMessage = `Suggest me a trip plan for the state of ${state}, city ${city}, from ${startDate} to ${endDate}. Budget: $${budget}. Tags: ${tags.join(', ')}. Preferences: ${preferences}`;

        const data = JSON.stringify({
            messages: [
                {
                    role: 'user',
                    content: userMessage
                }
            ],
            model: 'gpt-4',
            max_tokens: 150,
            temperature: 0.9
        });

        const xhr = new XMLHttpRequest();
        xhr.withCredentials = true;

        xhr.addEventListener('readystatechange', function () {
            if (this.readyState === this.DONE) {
                try {
                    const response = JSON.parse(this.responseText);
                    const tripResponse = document.getElementById('trip-response');
                    if (response.choices && response.choices[0] && response.choices[0].message) {
                        tripResponse.innerHTML = `
                            <h2>Your Trip Plan</h2>
                            <p>${response.choices[0].message.content}</p>
                        `;
                        tripResponse.style.display = 'block';
                    } else {
                        alert('Error: Invalid response from the API.');
                        tripResponse.innerHTML = '<p>Error: No valid response received.</p>';
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

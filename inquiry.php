<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photography Inquiry Form</title>
    
    <style>
       
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin: 10px 0 5px;
    color: #555;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}


    </style>
</head>
<body>
    <div class="container">
        <h2>Photography Inquiry Form</h2>
        <form action="inquiry_process.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="event_type">Event Type:</label>
            <select id="event_type" name="event_type" required>
                <option value="Wedding">Wedding</option>
                <option value="Birthday">Birthday</option>
                <option value="Corporate">Corporate Event</option>
                <option value="Portrait">Portrait Shoot</option>
                <option value="Other">Other</option>
            </select>

            <label for="event_date">Preferred Date:</label>
            <input type="date" id="event_date" name="event_date" required>

            <label for="budget">Estimated Budget (USD):</label>
            <input type="number" id="budget" name="budget" min="50" required>

            <label for="message">Additional Details:</label>
            <textarea id="message" name="message" rows="4"></textarea>

            <button type="submit">Submit Inquiry</button>
        </form>
    </div>
</body>
</html>

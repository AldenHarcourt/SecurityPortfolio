const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');

const app = express();
const PORT = 3000;

// Middleware to parse form data
app.use(bodyParser.urlencoded({ extended: true }));

// Serve static files (e.g., HTML, CSS)
app.use(express.static('pages'));

// Endpoint to handle form submissions
app.post('/submit-contact', async (req, res) => {
  const { name, email, message } = req.body;

  // Configure nodemailer
  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'aldenharcourt@gmail.com', // Replace with your email
      pass: 'Why0WiFi', // Replace with your email password or app password
    },
  });

  const mailOptions = {
    from: email,
    to: 'aldenharcourt@gmail.com', // Replace with your email
    subject: `New Contact Form Submission from ${name}`,
    text: `Name: ${name}\nEmail: ${email}\nMessage: ${message}`,
  };

  try {
    await transporter.sendMail(mailOptions);
    res.send('Thank you for contacting me! I will get back to you soon.');
  } catch (error) {
    console.error('Error sending email:', error);
    res.status(500).send('An error occurred. Please try again later.');
  }
});

// Start the server
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});

<nav>
  <ul>
    <li><a href="/repo-name/index.html">Home</a></li>
    <li><a href="/repo-name/pages/about.html">About</a></li>
    <li><a href="/repo-name/pages/portfolio.html">Portfolio</a></li>
    <li><a href="/repo-name/pages/blog.html">Blog</a></li>
    <li><a href="/repo-name/pages/contact.html">Contact</a></li>
  </ul>
</nav>

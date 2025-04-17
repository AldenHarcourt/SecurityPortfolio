require('dotenv').config();

const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware to parse URL-encoded form data
app.use(bodyParser.urlencoded({ extended: true }));

// Serve static files from "pages" for your HTML files
app.use(express.static('pages'));

// Serve static assets (like CSS) from "assets" under the /assets path
app.use('/assets', express.static('assets'));

// Endpoint to handle contact form submissions
app.post('/submit-contact', async (req, res) => {
  const { name, email, message } = req.body;

  // Configure nodemailer (update with your actual credentials)
  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: process.env.EMAIL_USER, // Replace with your email
      pass: process.env.EMAIL_PASS, // Replace with your email password or app password
    },
  });

  const mailOptions = {
    from: email,
    to: process.env.EMAIL_USER, // Replace with your email
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
app.listen(PORT, '0.0.0.0', () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});

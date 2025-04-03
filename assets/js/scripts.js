// This file contains JavaScript for interactive elements of the portfolio.
// It includes functions for handling navigation, animations, and dynamic content.

document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for internal links
    const links = document.querySelectorAll('a[href^="#"]');
    for (const link of links) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // Mobile navigation toggle
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('nav ul');
    if (navToggle) {
        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }

    // Dynamic content loading for portfolio entries
    const portfolioContainer = document.querySelector('#portfolio-entries');
    const projects = [
        {
            title: 'Server Setup and Pen-Testing',
            description: 'Documenting my experience setting up a server and conducting penetration testing.',
            link: 'pages/server-setup.html'
        },
        // Add more projects as needed
    ];

    projects.forEach(project => {
        const projectElement = document.createElement('div');
        projectElement.classList.add('project');
        projectElement.innerHTML = `
            <h3>${project.title}</h3>
            <p>${project.description}</p>
            <a href="${project.link}">Learn More</a>
        `;
        portfolioContainer.appendChild(projectElement);
    });
});
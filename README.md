# CoffeeTime

It's simple time management system which helps people with integration during drinking coffee

## Table of contents

- Requirements
- Installation
- Configuration
- Application Features
- FAQ
- Maintainers

## Requirements

- To run PHP for the web you need to install a Web Server like Nginx.
- Also need a PostgreSQL database server.
- Or you can use Docker containers on your server system.

## Installation
   
### Docker

1. Download and install docker on your computer from [docker.com](https://www.docker.com/get-started/)
   

## Configuration

### Docker

1. Clone repository or download it to your destination folder.
2. Run "docker-compose up" in terminal in your destination folder.
3. Open Web http://localhost:8080

## Application Features

### Main View:

From this screen, users can browse the page and access information about the creator.

### Login View:

Here, users can log in to their accounts if they already have one. If they don't have an account, they can proceed to the registration page.

### Registration View:

Users can create a new account on this page by providing their details and the room/apartment number where they reside.

### Booking View:

On this page, users can choose a date and time slot for a meeting (for coffee). They can also specify whether they prefer the meeting to take place in their room/apartment or elsewhere.

### Settings View:

In this section, users can modify their personal information such as name, surname, and email. Additionally, users can change their profile picture, which is displayed to other users.

### Notifications View:

Upon successful matching of two users, they receive a notification. The notification tile provides information about when and where the meeting will take place. Users can choose to accept or reject the meeting from this view. If both users accept, the tile's border turns green, and information about the meeting is displayed.


## CoffeeTime - Frequently Asked Questions (FAQ)

1. How can I use the CoffeeTime application?
   To use the CoffeeTime application, you need to create an account through the registration view. After logging in, users can browse pages, make coffee meeting reservations, and manage their profiles.

2. How do I register on CoffeeTime?
   Go to the registration view and provide your details, including your room/apartment number. After successfully creating an account, you can log in to the application.

3. How can I update my personal information and profile picture?
   Access the settings view, where you can edit your details such as name, surname, email, and change your profile picture, visible to other users.

4. How do I make a reservation for a coffee meeting?
   Navigate to the booking view, where you can choose a date, time slot, and specify the preferred meeting place (in your room/apartment or elsewhere).

5. What are notifications in CoffeeTime?
   Notifications inform about a successful match between two users. Users receive a notification about a planned meeting, with the option to accept or reject the proposal.

6. Can I browse pages without having an account?
   Yes, you can browse pages and access information about the creator without the need for an account. However, to use full features like meeting reservations, logging in is required.

7. How to decline a meeting invitation?
   In the notifications view, upon receiving an invitation, you can choose the option to decline, which will result in not accepting the meeting.

8. Can I change the meeting place after acceptance?
   After accepting a meeting, the place cannot be changed. It's essential to pay attention to the preferred location during the reservation.

9. How to contact CoffeeTime support in case of issues?
   Utilize the "Contact" option on the homepage to send a message to technical support in case of problems or questions related to the application.

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

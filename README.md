# 📚 E-Learning System 💻

### Signup
![StudentRegistration](https://github.com/VinayShetyeOfficial/E-Learning-System/assets/100470361/9b954b85-a245-45b5-b4ac-ca93a2006558)

### Login
![StudentLogin](https://github.com/VinayShetyeOfficial/E-Learning-System/assets/100470361/87ce49bb-413b-4a22-9e03-4d907ded11b7)


### Home Page
![HomePage](https://github.com/VinayShetyeOfficial/E-Learning-System/assets/100470361/83da18a6-f7a9-4ca7-8b0f-bb544c3eebb2)

### Home Page Courses
![HomePage_Courses](https://github.com/VinayShetyeOfficial/E-Learning-System/assets/100470361/f31c1608-cc7d-45b6-aac5-93cdec96ca9e)

### View All Courses
![AllCourses](https://github.com/VinayShetyeOfficial/E-Learning-System/assets/100470361/ac59951a-b6f5-4a31-9ac6-7e8129d4db5c)


### View Courses Structure
![ViewCourse](https://github.com/VinayShetyeOfficial/E-Learning-System/assets/100470361/9f1bbec4-c81c-4485-8b75-23b09597c946)


### User Profile
![UserProfile](https://github.com/VinayShetyeOfficial/E-Learning-System/assets/100470361/7d206867-e713-4e56-93ba-cc27cf72b5b5)

### Enrolled Courses
![EnrolledCourses](https://github.com/VinayShetyeOfficial/E-Learning-System/assets/100470361/bd555ad5-8f32-4224-b025-d27ea97979d6)

### User Feedback
![StudentFeedbacks](https://github.com/VinayShetyeOfficial/E-Learning-System/assets/100470361/4eefac3d-ed7b-4734-b1f7-408299e20d58)



## Description
The E-Learning System Project is a fully developed website that provides students with online courses to enroll. Students are required to sign up and log in to the system. After signing in, they can purchase courses available on the website by clicking the "Enroll" button. The website is integrated with the Paytm payment gateway to facilitate payments. Once a student successfully completes the payment, the purchased courses become accessible to them.

## Pages Overview

1. **Home Page 🏠:**
   - The home page is the first page users see when visiting the website.
   - It features a navigation bar with links to various pages: Home, Courses, Payment Status, Login, Signup, Feedback, and Contact.
   - Sections on the home page include:
     - Welcome section
     - Popular Courses section
     - Contact Us section
     - Students Feedback section
     - Three columns with information about the website, its categories, and contact details.
   - The footer contains copyright information and an admin panel button.

2. **Course Page ‎‍🎓:**
   - Displays a list of available courses in the form of Bootstrap cards.
   - Each course card includes an "Enroll" button for students to sign up.
   - Header banner and footer are consistent with the home page.

3. **Payment Status Page 💳:**
   - Shows the status of payments made by students.
   - Includes a search bar where students can enter their order ID to view payment receipts and download them in PDF format.
   - Footer matches the home page.

4. **My Profile Page 👤:**
   - Takes users to their student profile panel.
   - Profile section displays personal information (name, email, occupation) and allows profile picture upload and updates.
   - Enrolled courses section lists purchased courses and provides a "Watch Course" button.
   - Feedback section allows students to provide feedback on courses.

## Admin Panel 👮

The admin panel can be accessed by clicking the admin button in the footer of the home page. It provides several pages for managing website content:

1. **Dashboard 📋:**
   - Displays a summary of website data (e.g., number of courses, registered students, courses sold).
   - Includes a table of course orders with columns for order ID, course ID, student ID, order date, amount, and action buttons for deleting orders.

2. **Courses Page 🎓:**
   - Lists courses in table form with columns for course ID, course name, course author.
   - Action buttons allow editing or deleting courses.
   - Admins can also add new courses.

3. **Lessons Page 💻📝:**
   - Features a search bar to find lessons by ID.
   - Displays a table of lessons for each course, including lesson ID, name, and link.
   - Admins can add new lessons and edit existing ones.
  
## Technologies Used

- PHP
- MySQL
- JavaScript (for real-time chat functionality)
- HTML5
- CSS3

## Installation

1. Clone this repository to your local machine:
   ```bash
   git clone https://github.com/VinayShetyeOfficial/E-Learning-System.git

2. Set up your local development environment (e.g., XAMPP, WAMP, or similar) to run PHP and MySQL.
3. Create a MySQL database for the chat app (DB_name: chatapp).
4. Import the database schema from the provided SQL file (database folder).
5. Launch the chat app locally in your web browser:
   - Use the link `http://localhost/E-Learning-System/index.php`

### Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
This project is open-source and available for anyone to explore, learn from, and contribute to.
Feel free to customize the content and structure according to your preferences. <br><br> Happy coding! 😊


5. **Students Page 👨‍🎓:**
   - Lists registered students.
   - Provides information about each student, including name, email, and occupation.
   - Admins can manage student profiles.

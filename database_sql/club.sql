CREATE TABLE clubs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    club_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    members_count INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    telegram_link VARCHAR(255) NOT NULL
);

-- Sample data
INSERT INTO clubs (club_name, description, location, members_count, image_path, telegram_link) VALUES
('Google Developers Group on campus', 'GDG, well known by its old name GDSC, is one of the popular and beloved clubs...', 'Main Campus', 200, 'GDG.jpg', 'https://t.me/gdg_aastu'),
('Skill Spectrum', 'Skill Spectrum is also similar with GDG but at this club different skills will be shared among students...', 'Innovation Center', 200, 'skill spectrum.jpg', 'https://t.me/skillspectrum'),
('Congfit Youth Support Club', 'This club is simply used to build our psychology and understanding...', 'Student Union Hall', 200, 'cognfit.jpg', 'https://t.me/cognfit');
('CGI Club', ' This club is stablished in order to support students learndesigning 2D ,3D as well as animation characters. Animationmovies also prepared by members of this club. The club will give you all the knowledge to do this.', 'Student Union', 150, 'CGI.jpg', 'https://t.me/cgi_club'),
('Females Club', 'Females Club is organized inorder to Support Female students of Our cumpus starting from giving some orientation about campus life for freshs, as well as supporting in the acadamic processes. And abling the females use opportunities provided for females in our Cumpus as well nationally.', 'Innovation Center', 400, 'Females.jpg', 'https://t.me/females_club'),
('Book club', 'The background of all enterprenours, succeed people, are not separated from reading , toda tommorow leaders. This club will enhance our reading cu provide different life changing books for members', Union Hall', 100, 'Book club 'https://t.me/book_club');
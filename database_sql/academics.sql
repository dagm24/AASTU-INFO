CREATE TABLE academics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    program_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    duration INT NOT NULL
);

-- Sample data
INSERT INTO academics (program_name, description, location, duration) VALUES
('Bachelor of Science in Architecture', 'Focuses on design principles, construction techniques, and sustainable practices.', 'Addis Ababa', 5),
('Bachelor of Science in Mining Engineering', 'Covers mineral exploration, extraction techniques, and sustainable practices.', 'Addis Ababa', 5),
('Bachelor of Science in Chemical Engineering', 'provides an in-depth education in chemical engineering emphasizing chemical processes, materials science, and sustainable practices in industrial production and environment management.', 'Addis Ababa', 5),
-- the hidden engineering department fields
('Bachelor of Science in Software Engineering', 'Focuses on programming, system design, and software project management.', 'Addis Ababa', 5),
('Bachelor of Science in Electrical Engineering', 'offers a robust education in electrical systems, focusing on circuit design, power systems, and electronics. The program emphasizes practical applications and innovation, preparing students for successful careers in the electrical engineering field.', 'Addis Ababa', 5),
('Bachelor of Science in ElectroMechanical Engineering ', 'offers a unique blend of electrical and mechanical engineering education. The program focuses on the design, development, and maintenance of electromechanical systems, emphasizing practical applications and innovation. Students are prepared for careers in industries such as automation, manufacturing, and robotics.', 'Addis Ababa', 5),
('Bachelor of Science in Environmental Engineering', 'This program offers a comprehensive education in environmental engineering, focusing on sustainable practices and environmental protection strategies.', 'Addis Ababa', 5),
('Bachelor of Science in Civil Engineering ', 'This program offers a comprehensive education in civil engineering, focusing on structural design, construction management, and sustainable infrastructure development.', 'Addis Ababa', 5),
('Bachelor of Science in Mechanical Engineering ', 'The program provides an in-depth education in mechanical engineering emphasizing mechanical systems, thermodynamics, and manufacturing processes.', 'Addis Ababa', 5);
-- Applied Science department fiels
INSERT INTO academics (program_name, description, location, duration) VALUES
('Bachelor of Science in Biotechnology', 'Focuses on comprehensive education in biotechnology, molecular biology, genetic engineering, and biotechnological applications.', 'Addis Ababa', 4),
('Bachelor of Science in Food Science', 'Offers a comprehensive education in food science, focusing on food processing, safety, and quality management.', 'Addis Ababa', 4),
('Bachelor of Science in Geology', 'Offers a comprehensive education in geology, focusing on earth sciences, mineral exploration, and environmental geology.', 'Addis Ababa', 4),
('Bachelor of Science in Industrial Chemistry ', 'The Industrial Chemistry Department focuses on the application of chemical principles and processes in industrial settings. It prepares students to work in various industries, including pharmaceuticals, petrochemicals, and materials science by providing a strong foundation in chemistry, engineering, and technology. The curriculum emphasizes practical skills, innovation, and sustainable practices to address real-world challenges in industrial production and environmental management.', 'Addis Ababa', 4);

-- Set type to 'engineering' for all engineering programs
UPDATE academics
SET type = 'engineering'
WHERE program_name LIKE '%Engineering%';

-- Set type to 'applied' for applied science programs
UPDATE academics
SET type = 'applied'
WHERE program_name IN (
  'Bachelor of Science in Biotechnology',
  'Bachelor of Science in Food Science',
  'Bachelor of Science in Geology',
  'Bachelor of Science in Industrial Chemistry'
);
// Central content for the AASTU Smart Campus portal.
// Faithfully migrated from the legacy AASTU Info database.

export type Program = {
  name: string
  description: string
  duration: number
  college: string
}

export const engineeringPrograms: Program[] = [
  {
    name: "B.Sc. in Architecture",
    description:
      "Focuses on design principles, construction techniques, and sustainable practices.",
    duration: 5,
    college: "Civil & Architectural Engineering",
  },
  {
    name: "B.Sc. in Civil Engineering",
    description:
      "A comprehensive education in civil engineering, focusing on structural design, construction management, and sustainable infrastructure development.",
    duration: 5,
    college: "Civil & Architectural Engineering",
  },
  {
    name: "B.Sc. in Mining Engineering",
    description:
      "Covers mineral exploration, extraction techniques, and sustainable practices.",
    duration: 5,
    college: "Environmental & Chemical Engineering",
  },
  {
    name: "B.Sc. in Chemical Engineering",
    description:
      "In-depth education emphasizing chemical processes, materials science, and sustainable practices in industrial production and environmental management.",
    duration: 5,
    college: "Environmental & Chemical Engineering",
  },
  {
    name: "B.Sc. in Software Engineering",
    description:
      "Focuses on programming, system design, and software project management.",
    duration: 5,
    college: "Electrical & Mechanical Engineering",
  },
  {
    name: "B.Sc. in Electrical Engineering",
    description:
      "A robust education in electrical systems, focusing on circuit design, power systems, and electronics with an emphasis on practical applications and innovation.",
    duration: 5,
    college: "Electrical & Mechanical Engineering",
  },
  {
    name: "B.Sc. in Electromechanical Engineering",
    description:
      "A unique blend of electrical and mechanical engineering focused on the design, development, and maintenance of electromechanical systems for automation, manufacturing, and robotics.",
    duration: 5,
    college: "Electrical & Mechanical Engineering",
  },
  {
    name: "B.Sc. in Mechanical Engineering",
    description:
      "In-depth education emphasizing mechanical systems, thermodynamics, and manufacturing processes.",
    duration: 5,
    college: "Electrical & Mechanical Engineering",
  },
  {
    name: "B.Sc. in Environmental Engineering",
    description:
      "A comprehensive education in environmental engineering, focusing on sustainable practices and environmental protection strategies.",
    duration: 5,
    college: "Environmental & Chemical Engineering",
  },
]

export const appliedSciencePrograms: Program[] = [
  {
    name: "B.Sc. in Biotechnology",
    description:
      "Comprehensive education in biotechnology, molecular biology, genetic engineering, and biotechnological applications.",
    duration: 4,
    college: "Applied Sciences",
  },
  {
    name: "B.Sc. in Food Science",
    description:
      "Comprehensive education in food science, focusing on food processing, safety, and quality management.",
    duration: 4,
    college: "Applied Sciences",
  },
  {
    name: "B.Sc. in Geology",
    description:
      "Comprehensive education in geology, focusing on earth sciences, mineral exploration, and environmental geology.",
    duration: 4,
    college: "Applied Sciences",
  },
  {
    name: "B.Sc. in Industrial Chemistry",
    description:
      "Application of chemical principles and processes in industrial settings, preparing students for pharmaceuticals, petrochemicals, and materials science with an emphasis on sustainable practices.",
    duration: 4,
    college: "Applied Sciences",
  },
]

export type Block = {
  name: string
  blockNumber: string
  summary: string
  description: string
  category: "College" | "Facility" | "Dormitory"
}

export const blocks: Block[] = [
  {
    name: "College of Civil and Architectural Engineering",
    blockNumber: "63",
    summary: "Programs offered in civil and architectural engineering.",
    description:
      "Located in Block 63, this college includes departments focused on civil and architectural disciplines.",
    category: "College",
  },
  {
    name: "College of Electrical and Mechanical Engineering",
    blockNumber: "64",
    summary: "Programs and opportunities in electrical and mechanical engineering.",
    description:
      "Situated in Block 64, this college encompasses the Departments of Electrical Engineering, Mechanical Engineering, and Software Engineering.",
    category: "College",
  },
  {
    name: "College of Environmental and Chemical Engineering",
    blockNumber: "72",
    summary: "Programs available in environmental and chemical engineering.",
    description:
      "Located in Block 72, this college includes the Department of Environmental Engineering and the Department of Chemical Engineering.",
    category: "College",
  },
  {
    name: "College of Applied Sciences",
    blockNumber: "71",
    summary: "Diverse programs offered in applied sciences.",
    description:
      "Block 71 houses the Departments of Food and Nutrition, Biotechnology, Industrial Engineering, and Geology.",
    category: "College",
  },
  {
    name: "Clinic",
    blockNumber: "13",
    summary: "Health services for students including consultations and wellness programs.",
    description:
      "The clinic offers a range of health services to students, including medical consultations, mental health support, and wellness programs designed to promote overall health and well-being.",
    category: "Facility",
  },
  {
    name: "Engineering Library",
    blockNumber: "101",
    summary: "An open, flexible study environment for engineering students.",
    description:
      "The Engineering Library features an open and flexible environment with free spaces and tension boxes where students can work on their own laptops. Access requires presenting a student ID at the entrance, fostering collaboration and study.",
    category: "Facility",
  },
  {
    name: "Digital Library",
    blockNumber: "101",
    summary: "Computers and digital resources for all students.",
    description:
      "The Digital Library offers a range of computers for students who need digital resources, with a designated partition for female students and additional computers and tension boxes on the first floor, promoting a balanced study environment.",
    category: "Facility",
  },
  {
    name: "Female Students' Dormitories",
    blockNumber: "2, 4, 5, 6, 8",
    summary: "Safe and supportive dormitory community for female students.",
    description:
      "Blocks 2, 4, 5, 6, and 8 are designated for female students, offering a safe and supportive community equipped with essential amenities. Block 3 is reserved for female fast-track postgraduate students.",
    category: "Dormitory",
  },
  {
    name: "Male Students' Dormitories",
    blockNumber: "7, 9, 10, 11, 12+",
    summary: "Comfortable living arrangements for male students.",
    description:
      "Blocks 7, 9, 10, 11, 12, 13, 16, 17, 25, and 28 are allocated for male students, ensuring access to comfortable and suitable living arrangements.",
    category: "Dormitory",
  },
]

export type Office = {
  title: string
  summary: string
  details: string
}

export const offices: Office[] = [
  {
    title: "Academics",
    summary: "Monitors and resolves educational issues.",
    details:
      "Monitors and controls education-related issues such as disagreements with instructors, delayed corrections, unpublished mid-term and final results, and library operating hours.",
  },
  {
    title: "Health",
    summary: "Provides essential health services for students.",
    details:
      "Ensures any student can get necessary services in case of health problems, including ambulance service and proper examination, and helps oversee whether food served to students is healthy.",
  },
  {
    title: "Discipline",
    summary: "Maintains campus peace and security.",
    details:
      "Responsible for respecting the peace and quiet of the campus, ensuring students learn properly without security problems, and protecting their well-being.",
  },
  {
    title: "Women",
    summary: "Empowers women in science and technology.",
    details:
      "Monitors everything related to women so they can use their potential in science and technology, organizing events in collaboration with the Women's and Social Bureau.",
  },
  {
    title: "Student Cafeteria",
    summary: "Ensures food quality and hygiene.",
    details:
      "Maintains the quality of food, the washing of eating utensils, the correctness of taste, and suitability for health.",
  },
  {
    title: "General Service",
    summary: "Oversees campus services.",
    details:
      "Controls total services on campus, monitoring dorm proctors, water, electricity, shops, and the quality and price of food where students pay to eat.",
  },
  {
    title: "Charity",
    summary: "Helps people in the university with money or goods.",
    details:
      "Collects support from sponsors or students, including clothes, shoes, books, and materials, and gives them to charitable institutions.",
  },
  {
    title: "Clubs",
    summary: "Oversees all university clubs.",
    details:
      "All clubs are responsible to this department. Proposals to establish a club are prepared, submitted, and approved by the student affairs dean.",
  },
  {
    title: "Promotion",
    summary: "A bridge between the Union and the students.",
    details:
      "Informs students of new information, notifies opinions of students, deans, and parents, and posts on the Student Union channel.",
  },
  {
    title: "Finance",
    summary: "Controls expenses and secures income sources.",
    details:
      "Manages the union's budget and expenses while ensuring diverse income sources such as fundraising, sponsorships, and grants.",
  },
  {
    title: "President's Office",
    summary: "Superintendent of the 12 sections.",
    details:
      "Oversees the management and maintenance of the 12 sections, ensuring they are well-maintained, properly utilized, and meet the needs of their occupants.",
  },
  {
    title: "Parliamentary Affairs Office",
    summary: "Assembly of Parliament.",
    details:
      "Oversees operations and maintenance of the assembly chamber, ensuring it is prepared for meetings, equipped with technology, and logistically ready for parliamentary sessions.",
  },
]

export type Member = {
  name: string
  role: string
  linkedin: string
  telegram: string
}

export const unionMembers: Member[] = [
  { name: "Solomon Tarekegne", role: "President", linkedin: "https://www.linkedin.com/in/solomon-tarekegne", telegram: "https://t.me/solomon_t" },
  { name: "Kidus Haymanot", role: "Vice President", linkedin: "https://www.linkedin.com/in/kidus-haymanot", telegram: "https://t.me/kidus_h" },
  { name: "Nathan Amsalu", role: "Academics", linkedin: "https://www.linkedin.com/in/nathan-amsalu", telegram: "https://t.me/nathan_a" },
  { name: "Habtamu Kebede", role: "Discipline", linkedin: "https://www.linkedin.com/in/habtamu-kebede", telegram: "https://t.me/habtamu_k" },
  { name: "Gutu Shigutie", role: "Health", linkedin: "https://www.linkedin.com/in/gutu-shigutie", telegram: "https://t.me/gutu_s" },
  { name: "Dagmawit Hintsa", role: "Women", linkedin: "https://www.linkedin.com/in/dagmawit-hintsa", telegram: "https://t.me/dagmawit_h" },
  { name: "Kidus Goshu", role: "Student Cafeteria", linkedin: "https://www.linkedin.com/in/Kidus-Goshu", telegram: "https://t.me/kidus_g" },
  { name: "H. Mikael Getachew", role: "General Service", linkedin: "https://www.linkedin.com/in/hmikael-getachew", telegram: "https://t.me/hmikael_g" },
]

export type Leader = {
  name: string
  role: string
  email: string
}

export const leadershipTeam: Leader[] = [
  { name: "Dereje Engida Woldemichael (PhD)", role: "President", email: "dereje.engida@aastu.edu.et" },
  { name: "Kemal Ibrahim", role: "Vice-President of Academic Affairs", email: "kemal.ibrahim@aastu.edu.et" },
  { name: "Betelhem Lakew Mamo", role: "College of Natural & Applied Science", email: "betelhem.lakew@aastu.edu.et" },
  { name: "Bonsa Reta Mosisa", role: "Mechanical Engineering", email: "bonsa.reta@aastu.edu.et" },
  { name: "Chere Lemma Urgaya", role: "Software Engineering", email: "chere.lemma@aastu.edu.et" },
  { name: "Biniam Atnafe Beyene", role: "Faculty Member", email: "biniam.atnafe@aastu.edu.et" },
  { name: "Hussien Seid Worku", role: "Software Engineering", email: "hussien.seid@aastu.edu.et" },
  { name: "Zemenu Yaregal Belete (PhD)", role: "College of Natural & Applied Science", email: "zemenu.yaregal@aastu.edu.et" },
  { name: "Asaminew Gizaw Egu", role: "Electrical & Computer Engineering", email: "asamnew.gizaw@aastu.edu.et" },
  { name: "Dagmawie Tesfaye Mengistu", role: "Social Sciences Division", email: "dagmawie.tesfaye@aastu.edu.et" },
  { name: "Dr. Aman Kassaye Sibhatu", role: "Chemical Engineering", email: "aman.kasye@aastu.edu.et" },
  { name: "Gamachis Korsa Jabicho", role: "Biotechnology", email: "gamachis.korsa@aastu.edu.et" },
  { name: "Gebrehiwot Gebreslassie Beyene", role: "College of Natural & Applied Science", email: "gebrehiwot.gebreslassie@aastu.edu.et" },
  { name: "Semir Ibrahim Alemu", role: "College of Social Science & Humanities", email: "semir.ibrahim@aastu.edu.et" },
  { name: "Seyoum Getachew Nigussie", role: "Electromechanical Engineering", email: "seyoum.getachew@aastu.edu.et" },
  { name: "Tefera Bahiru Ambo", role: "Civil Engineering", email: "tefera.bahiru@aastu.edu.et" },
]

export type Club = {
  name: string
  description: string
  location: string
  members: number
  telegram: string
  icon: "code" | "sparkles" | "brain" | "film" | "venus" | "book"
}

export const clubs: Club[] = [
  {
    name: "Google Developers Group on Campus",
    description:
      "GDG, well known by its former name GDSC, is one of the most popular and beloved clubs on campus, connecting students with the global developer community through workshops, hackathons, and tech talks.",
    location: "Main Campus",
    members: 200,
    telegram: "https://t.me/gdg_aastu",
    icon: "code",
  },
  {
    name: "Skill Spectrum",
    description:
      "Similar in spirit to GDG, Skill Spectrum is a space where a wide variety of skills are shared among students, from design to entrepreneurship and beyond.",
    location: "Innovation Center",
    members: 200,
    telegram: "https://t.me/skillspectrum",
    icon: "sparkles",
  },
  {
    name: "CognFit Youth Support Club",
    description:
      "A club dedicated to building psychological well-being and self-understanding, helping students strengthen their mindset and resilience.",
    location: "Student Union Hall",
    members: 200,
    telegram: "https://t.me/cognfit",
    icon: "brain",
  },
  {
    name: "CGI Club",
    description:
      "Established to support students in learning 2D and 3D design and animation. Members create animated characters and films, gaining hands-on creative and technical knowledge.",
    location: "Student Union",
    members: 150,
    telegram: "https://t.me/cgi_club",
    icon: "film",
  },
  {
    name: "Females Club",
    description:
      "Organized to support female students from orientation for freshmen to academic support, helping women leverage opportunities available on campus and nationally.",
    location: "Innovation Center",
    members: 400,
    telegram: "https://t.me/females_club",
    icon: "venus",
  },
  {
    name: "Book Club",
    description:
      "Behind every entrepreneur and successful leader is a habit of reading. The Book Club enhances reading culture and provides life-changing books for its members.",
    location: "Union Hall",
    members: 100,
    telegram: "https://t.me/book_club",
    icon: "book",
  },
]

export type ReligiousAssociation = {
  name: string
  description: string
  meeting: string
  contact: string
}

export const religiousAssociations: ReligiousAssociation[] = [
  {
    name: "Ethiopian Orthodox Tewahedo Students' Association",
    description:
      "A spiritual community for Orthodox Christian students offering weekly worship, Bible study, choir, and fellowship in a supportive environment.",
    meeting: "Weekends · Campus Prayer Hall",
    contact: "https://t.me/aastu_eotc",
  },
  {
    name: "Muslim Students' Association",
    description:
      "Supports Muslim students in practicing their faith, coordinating prayer times, Jummah, and community service activities across campus.",
    meeting: "Daily · Campus Masjid",
    contact: "https://t.me/aastu_msa",
  },
  {
    name: "Protestant Christian Fellowship",
    description:
      "A vibrant fellowship of evangelical students gathering for praise, worship, discipleship, and outreach throughout the academic year.",
    meeting: "Fridays · Fellowship Hall",
    contact: "https://t.me/aastu_pcf",
  },
  {
    name: "Catholic Students' Community",
    description:
      "A welcoming community for Catholic students, hosting mass, rosary gatherings, and charitable initiatives on and off campus.",
    meeting: "Sundays · Campus Chapel",
    contact: "https://t.me/aastu_csc",
  },
]

export const universityStats = [
  { label: "Undergraduate Programs", value: "13+" },
  { label: "Colleges & Schools", value: "4" },
  { label: "Student Clubs", value: "20+" },
  { label: "Founded", value: "2011" },
]

export const admissionRequirements = [
  "Successful completion of the Ethiopian University Entrance Examination (EUEE) with a competitive score in the natural science stream.",
  "Placement by the Ministry of Education based on academic performance and program capacity.",
  "Completed original and photocopied grade 12 transcript and national exam results.",
  "Valid identification and recent passport-size photographs.",
  "Medical fitness certificate from a recognized health institution.",
]

export const admissionSteps = [
  { step: "01", title: "Sit the EUEE", description: "Complete grade 12 and take the Ethiopian University Entrance Examination in the natural science stream." },
  { step: "02", title: "Receive Placement", description: "The Ministry of Education assigns qualified students to AASTU based on results and program capacity." },
  { step: "03", title: "Register on Campus", description: "Bring original documents, transcripts, and photos to complete on-site registration at the registrar." },
  { step: "04", title: "Begin Your Journey", description: "Attend freshman orientation, receive your student ID, and start classes in your assigned college." },
]

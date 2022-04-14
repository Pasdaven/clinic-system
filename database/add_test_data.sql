-- Doctor SQL insert example model
INSERT INTO `doctor`
VALUES  ('1000', 'D123123123', 'david', 'Male', '2012-03-01', '0312124324', 'working'), 
        ('1004', 'E122423473', 'steven', 'Female', '2021-09-08', '0979821382', 'working'),
        ('1008', 'F123697123', 'ride', 'Male', '1423-08-23', '0384120809', 'working'),
        ('1012', 'D134590244', 'mountain', 'Female', '1969-06-09', '0218379323', 'working'),
        ('1016', 'G324987942', 'pig', 'Female', '1987-08-07', '0973782132', 'working');
       
-- Medical SQL insert example model
INSERT INTO `medicine`
VALUES  ('3', '安立復錠', 'Abilify 15mg Tablet'),
        ('4', '膿化清膠囊', 'Acetin 200Mg Cap'),
        ('6', '骨力強注射液', 'Aclasta 5mg/100ml Solution for Infusion'),
        ('10', '吸附破傷風類毒素', 'Adsorbed Tetanus Vaccine 0.5ml Injection'),
        ('12', '阿雷彼阿慶注射液', 'Aleviatin 250mg Injection');

-- Patient SQL insert example model
INSERT INTO `patient`
VALUES  ('B213249432', NULL, '阿南懷', 'Male', '2002-04-03', 'AB', '0912345345'),
        ('B242399432', NULL, '阿東雅', 'Female', '2002-04-03', 'B', '0912977745'),
        ('B219089432', NULL, '阿南敏', 'Male', '2002-04-03', 'A', '0912385545'),
        ('L293849432', NULL, '阿南播', 'Female', '2002-04-03', 'O', '0912452145'),
        ('P013249432', NULL, '阿南郭', 'Male', '2002-04-03', 'A', '0915099045');

-- Book SQL insert example model
INSERT INTO `book`
VALUES  ('S6DHE4DHF7', 'waiting', '2022-03-23 15:00:00', '1000', 'B123456789', 'good@@gmail.com'),
        ('ASDAS6DHFD', 'waiting', '2022-03-20 15:00:00', '1004', 'D295738116', 'eat@gmail.com'),
        ('JDG6SDGYDS', 'finish', '2022-03-12 15:00:00', '1012', 'F204736523', 'write@gmail.com'),
        ('JKDJSSS998', 'waiting', '2022-02-28 15:00:00', '1008', 'A223445667', 'fcu@gmail.com'),
        ('JSDS674SDJ', 'waiting', '2022-03-25 15:00:00', '1016', 'G228721335', 'gogogo@gmail.com'),
        ('JHSG554SDS', 'cancel', '2022-03-10 15:00:00', '1004', 'S763112556', 'apple@gmail.com');

-- Patient records SQL insert example model
INSERT INTO `patient_records`
VALUES  (NULL, '1', '1000', '2022-03-20', 'AIDS', '30', NULL),
        (NULL, '3', '1012', '2022-03-10', 'COVID-19', '12', NULL),
        (NULL, '2', '1016', '2022-04-10', 'COVID-20', '3', NULL),
        (NULL, '3', '1012', '2022-03-15', 'COVID-16', '5', NULL);

-- Schedule SQL insert example model
INSERT INTO `schedule` 
VALUES  ('1000', 'Mon', 'morning', 'first'),
        ('1000', 'Tues', 'morning', 'first'),
        ('1000', 'Thur', 'evening', 'second'),
        ('1000', 'Sat', 'noon', 'first'),
        ('1004', 'Wed', 'morning', 'first'),
        ('1004', 'Fri', 'evening', 'first'),
        ('1004', 'Sun', 'morning', 'first'),
        ('1008', 'Mon', 'morning', 'second'),
        ('1008', 'Tues', 'noon', 'first'),
        ('1008', 'Sat', 'morning', 'first');

--  allergr_med SQL insert example model
INSERT INTO `allergy_list`
VALUES ('1', '10'), 
       ('1', '3');

--  med_list SQL insert example model

INSERT INTO `med_list`
VALUES ('1', '4'),
       ('1', '10');
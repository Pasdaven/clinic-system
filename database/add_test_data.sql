-- Doctor SQL insert example model
INSERT INTO `doctor`
VALUES  ('1000', 'D123123123', 'david', 'Male', '2012-03-01', '0312124324', 'working'), 
        ('1004', 'E122423473', 'steven', 'Female', '2021-09-08', '0979821382', 'working'),
        ('1008', 'F123697123', 'ride', 'Male', '1423-08-23', '0384120809', 'working'),
        ('1012', 'D134590244', 'mountain', 'Female', '1969-06-09', '0218379323', 'working'),
        ('1016', 'G324987942', 'pig', 'Female', '1987-08-07', '0973782132', 'working');
       
-- Medical SQL insert example model
INSERT INTO `medicine`
VALUES  ('3', '安立復錠', 'Abilify 15mg Tablet', '安立復錠'),
        ('4', '膿化清膠囊', 'Acetin 200Mg Cap', '膿化清膠囊'),
        ('6', '骨力強注射液', 'Aclasta 5mg/100ml Solution for Infusion', '骨力強注射液'),
        ('10', '吸附破傷風類毒素', 'Adsorbed Tetanus Vaccine 0.5ml Injection', '吸附破傷風類毒素'),
        ('12', '阿雷彼阿慶注射液', 'Aleviatin 250mg Injection', '阿雷彼阿慶注射液');

-- Patient SQL insert example model
INSERT INTO `patient`
VALUES  ('B213249432', NULL, '阿南懷', 'Male', '2002-04-03', 'AB', '0912345345'),
        ('B242399432', NULL, '阿東雅', 'Female', '2002-04-03', 'B', '0912977745'),
        ('B219089432', NULL, '阿南敏', 'Male', '2002-04-03', 'A', '0912385545'),
        ('L293849432', NULL, '阿南播', 'Female', '2002-04-03', 'O', '0912452145'),
        ('P013249432', NULL, '阿南郭', 'Male', '2002-04-03', 'A', '0915099045');

-- Patient records SQL insert example model
INSERT INTO `patient_records`
VALUES  (NULL, '1', '1000', '2022-03-20', 'AIDS', '30', NULL),
        (NULL, '3', '1012', '2022-03-10', 'COVID-19', '12', NULL),
        (NULL, '2', '1016', '2022-04-10', 'COVID-20', '3', NULL),
        (NULL, '4', '1012', '2022-03-10', 'COVID-190', '12', NULL),
        (NULL, '2', '1016', '2022-04-10', 'COVID-20', '3', NULL),
        (NULL, '5', '1012', '2022-02-10', 'COVID-119', '2', NULL),
        (NULL, '2', '1016', '2022-04-10', 'COVID-120', '3', NULL),
        (NULL, '3', '1012', '2022-03-15', 'COVID-16', '5', NULL);

-- Schedule SQL insert example model
INSERT INTO `schedule` 
VALUES  (NULL, '1000', '1', 'morning', '1'),
        (NULL, '1004', '1', 'morning', '2'),
        (NULL, '1012', '1', 'evening', '1'),
        (NULL, '1016', '1', 'evening', '2'),
        (NULL, '1000', '1', 'noon', '1'),
        (NULL, '1008', '1', 'noon', '2'),
        (NULL, '1012', '2', 'morning', '1'),
        (NULL, '1004', '2', 'morning', '2'),
        (NULL, '1000', '2', 'evening', '1'),
        (NULL, '1016', '2', 'evening', '2'),
        (NULL, '1004', '2', 'noon', '1'),
        (NULL, '1008', '2', 'noon', '2'),
        (NULL, '1016', '3', 'morning', '1'),
        (NULL, '1004', '3', 'morning', '2'),
        (NULL, '1000', '3', 'evening', '1'),
        (NULL, '1016', '3', 'evening', '2'),
        (NULL, '1000', '3', 'noon', '1'),
        (NULL, '1004', '3', 'noon', '2'),
        (NULL, '1012', '4', 'morning', '1'),
        (NULL, '1004', '4', 'morning', '2'),
        (NULL, '1008', '4', 'evening', '1'),
        (NULL, '1016', '4', 'evening', '2'),
        (NULL, '1004', '4', 'noon', '1'),
        (NULL, '1008', '4', 'noon', '2'),
        (NULL, '1012', '5', 'morning', '1'),
        (NULL, '1004', '5', 'morning', '2'),
        (NULL, '1008', '5', 'evening', '1'),
        (NULL, '1016', '5', 'evening', '2'),
        (NULL, '1004', '5', 'noon', '1'),
        (NULL, '1008', '5', 'noon', '2'),
        (NULL, '1000', '6', 'morning', '1'),
        (NULL, '1004', '6', 'morning', '2'),
        (NULL, '1004', '6', 'evening', '1'),
        (NULL, '1016', '6', 'evening', '2'),
        (NULL, '1012', '6', 'noon', '1'),
        (NULL, '1008', '6', 'noon', '2'),
        (NULL, '1012', '0', 'morning', '1'),
        (NULL, '1004', '0', 'morning', '2'),
        (NULL, '1008', '0', 'evening', '1'),
        (NULL, '1000', '0', 'evening', '2'),
        (NULL, '1000', '0', 'noon', '1'),
        (NULL, '1004', '0', 'noon', '2');
        
--  allergr_med SQL insert example model
INSERT INTO `allergy_list`
VALUES ('1', '10'),
       ('3', '3'), 
       ('5', '10'), 
       ('1', '1'), 
       ('3', '6'), 
       ('4', '12'), 
       ('2', '10'), 
       ('2', '3');

--  med_list SQL insert example model

INSERT INTO `med_list`
VALUES ('1', '4'),
       ('1', '10');
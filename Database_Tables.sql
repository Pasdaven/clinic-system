CREATE TABLE doctor
  (
     doc_id           INT UNSIGNED PRIMARY KEY auto_increment comment '醫生編號',
     id               INT UNSIGNED NOT NULL UNIQUE comment '身分證',
     doc_name         VARCHAR(5) comment '姓名',
     sex              VARCHAR(1) comment '性別',
     birth            DATE comment '生日',
     phonenum         INT UNSIGNED comment '手機號碼',
     consulation_time DATETIME comment '看診時間'
  )
comment '醫生'; 

CREATE TABLE patient
  (
     id           INT UNSIGNED NOT NULL UNIQUE comment '身分證',
     case_id      INT UNSIGNED PRIMARY KEY auto_increment comment '病歷號碼',
     patient_name VARCHAR(5) comment '姓名',
     sex          VARCHAR(1) comment '性別',
     birth        DATE comment '生日',
     blod_type    VARCHAR(1) comment '血型',
     phone_num    INT UNSIGNED comment '手機號碼',
     allergy      INT UNSIGNED comment '藥物過敏'
  )
comment '病人'; 

CREATE TABLE medicine
  (
     med_id   INT UNSIGNED PRIMARY KEY comment '藥品編號',
     med_name VARCHAR(20) comment '藥品名稱'
  )
comment '藥物' ;

CREATE TABLE book
  (
     book_id          INT UNSIGNED PRIMARY KEY comment '掛號編號',
     book_state       INT UNSIGNED  comment '等候狀態',
     consulation_time DATETIME comment '看診時間',
     doc_id           INT UNSIGNED NOT NULL comment '醫生編號',
     patient_id       INT UNSIGNED NOT NULL comment '病人身分證',
     email_address    VARCHAR(30) NOT NULL comment '病人信箱'
  )
comment '掛號'; 

CREATE TABLE patient_records
  (
     record_id        INT UNSIGNED PRIMARY KEY comment '看診紀錄編號',
     case_id          INT UNSIGNED NOT NULL comment '病歷號碼',
     CONSTRAINT case_id FOREIGN KEY(case_id) REFERENCES patient (case_id) ON UPDATE CASCADE ON DELETE CASCADE,
     doc_id           INT UNSIGNED NOT NULL comment ' 醫生編號',
     CONSTRAINT doc_id FOREIGN KEY(doc_id) REFERENCES doctor (doc_id),
     consulation_date DATE comment '看診日期',
     disease_name     VARCHAR(20) comment '疾病名稱',
     med_days         INT UNSIGNED comment '用藥天數',
     med_id_01        INT UNSIGNED comment '藥物編號_01',
     med_id_02        INT UNSIGNED comment '藥物編號_02',
     med_id_03        INT UNSIGNED comment '藥物編號_03',
     med_id_04        INT UNSIGNED comment '藥物編號_04',
     med_id_05        INT UNSIGNED comment '藥物編號_05',
     med_id_06        INT UNSIGNED comment '藥物編號_06',
     med_id_07        INT UNSIGNED comment '藥物編號_07',
     med_id_08        INT UNSIGNED comment '藥物編號_08',
     med_id_09        INT UNSIGNED comment '藥物編號_09',
     med_id_10        INT UNSIGNED comment '藥物編號_10',
     CONSTRAINT med_id_01 FOREIGN KEY(med_id_01) REFERENCES medicine (med_id),
     CONSTRAINT med_id_02 FOREIGN KEY(med_id_02) REFERENCES medicine (med_id),
     CONSTRAINT med_id_03 FOREIGN KEY(med_id_03) REFERENCES medicine (med_id),
     CONSTRAINT med_id_04 FOREIGN KEY(med_id_04) REFERENCES medicine (med_id),
     CONSTRAINT med_id_05 FOREIGN KEY(med_id_05) REFERENCES medicine (med_id),
     CONSTRAINT med_id_06 FOREIGN KEY(med_id_06) REFERENCES medicine (med_id),
     CONSTRAINT med_id_07 FOREIGN KEY(med_id_07) REFERENCES medicine (med_id),
     CONSTRAINT med_id_08 FOREIGN KEY(med_id_08) REFERENCES medicine (med_id),
     CONSTRAINT med_id_09 FOREIGN KEY(med_id_09) REFERENCES medicine (med_id),
     CONSTRAINT med_id_10 FOREIGN KEY(med_id_10) REFERENCES medicine (med_id)
  )
comment '病歷'; 
CREATE TABLE doctor (
  doc_id INT UNSIGNED PRIMARY KEY comment '醫生編號',
  id_num VARCHAR(10) NOT NULL UNIQUE comment '身分證',
  doc_name VARCHAR(40) comment '姓名',
  sex ENUM('Male', 'Female') comment '性別',
  birth DATE comment '生日',
  phone_num INT UNSIGNED comment '手機號碼',
  doc_state ENUM ('working', 'quit', 'fire') NOT NULL DEFAULT 'working' comment '工作情況'
) comment '醫生';

CREATE TABLE medicine (
  med_id INT UNSIGNED PRIMARY KEY comment '藥品編號',
  med_name VARCHAR(40) comment '藥品名稱',
  med_academic_name VARCHAR(40) comment '藥品學術名稱'
) comment '藥物';

CREATE TABLE patient (
  id_num VARCHAR(10) NOT NULL UNIQUE comment '身分證',
  case_id INT UNSIGNED PRIMARY KEY auto_increment comment '病歷號碼',
  patient_name VARCHAR(40) comment '姓名',
  sex ENUM('Male', 'Female') comment '性別',
  birth DATE comment '生日',
  blood_type ENUM('A', 'B', 'O', 'AB') comment '血型',
  phone_num INT UNSIGNED comment '手機號碼'
) comment '病人';

CREATE TABLE allergy_list (
  case_id INT UNSIGNED NOT NULL COMMENT '病例號碼',
  allergy_med_id INT UNSIGNED COMMENT '過敏藥物',
  CONSTRAINT allergy_med_id FOREIGN KEY(allergy_med_id) REFERENCES medicine (med_id),
  CONSTRAINT allergy_list_case_id FOREIGN KEY(case_id) REFERENCES patient (case_id),
  PRIMARY KEY(case_id,allergy_med_id)
) COMMENT '病人過敏藥物';

CREATE TABLE book (
  book_id VARCHAR(40) PRIMARY KEY comment '掛號編號',
  book_state ENUM('waiting', 'finish', 'cancel') NOT NULL DEFAULT 'waiting' comment '等候狀態',
  consulation_time DATETIME comment '看診時間',
  doc_id INT UNSIGNED NOT NULL comment '醫生編號',
  id_num VARCHAR(10) NOT NULL comment '病人身分證',
  email_address VARCHAR(30) NOT NULL comment '病人信箱',
  CONSTRAINT book_doc_id FOREIGN KEY(doc_id) REFERENCES doctor (doc_id) ON UPDATE CASCADE ON DELETE CASCADE
) comment '掛號';

CREATE TABLE patient_records (
  record_id INT UNSIGNED PRIMARY KEY auto_increment comment '看診紀錄編號',
  case_id INT UNSIGNED NOT NULL comment '病歷號碼',
  doc_id INT UNSIGNED NOT NULL comment '醫生編號',
  consulation_date DATE comment '看診日期',
  disease_name VARCHAR(20) comment '疾病名稱',
  med_days INT UNSIGNED comment '用藥天數',
  comment VARCHAR(100) NULL comment '備註',
  CONSTRAINT case_id FOREIGN KEY(case_id) REFERENCES patient (case_id) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT patient_records_doc_id FOREIGN KEY(doc_id) REFERENCES doctor (doc_id)
) comment '病歷';

CREATE TABLE med_list (
  record_id INT UNSIGNED NOT NULL COMMENT '看診紀錄編號',
  med_id INT UNSIGNED COMMENT '藥物編號',
  CONSTRAINT record_id FOREIGN KEY(record_id) REFERENCES patient_records (record_id),
  CONSTRAINT med_id FOREIGN KEY(med_id) REFERENCES medicine (med_id),
  PRIMARY KEY(record_id,med_id)
) COMMENT '用藥清單';

CREATE TABLE schedule (
  doc_id INT UNSIGNED comment '醫生編號',
  week_day ENUM (
    'Mon',
    'Tues',
    'Wed',
    'Thur',
    'Fri',
    'Sat',
    'Sun'
  ) comment '星期',
  time_period ENUM ('morning', 'noon', 'evening') comment '時段',
  room ENUM ('first', 'second') comment '診間',
  CONSTRAINT schedule_doc_id FOREIGN KEY (doc_id) REFERENCES doctor (doc_id) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARY KEY(week_day,time_period,room)
) comment '班表';
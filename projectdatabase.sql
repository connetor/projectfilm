-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8 ;
USE `project` ;

-- -----------------------------------------------------
-- Table `project`.`MemberInformation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`MemberInformation` ;

CREATE TABLE IF NOT EXISTS `project`.`MemberInformation` (
  `Member_ID` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(30) NOT NULL,
  `Password` VARCHAR(30) NOT NULL,
  `Fname` VARCHAR(50) NOT NULL,
  `Lname` VARCHAR(50) NOT NULL,
  `Bdate` DATE NOT NULL,
  `Address` TEXT NOT NULL,
  `ProfilePic` VARCHAR(100) NOT NULL,
  `Phone` CHAR(10) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `Status` VARCHAR(15) NOT NULL COMMENT 'เช็คสถานะการอนุมัติ',
  `Point` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`Member_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`WorkerInformation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`WorkerInformation` ;

CREATE TABLE IF NOT EXISTS `project`.`WorkerInformation` (
  `Worker_ID` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(30) NOT NULL,
  `Password` VARCHAR(30) NOT NULL,
  `Fname` VARCHAR(50) NOT NULL,
  `Lname` VARCHAR(50) NOT NULL,
  `Bdate` DATE NOT NULL,
  `Address` TEXT NOT NULL,
  `ProfilePic` VARCHAR(100) NOT NULL,
  `Phone` CHAR(10) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `Status` VARCHAR(15) NOT NULL DEFAULT 'Offline',
  `CerPic` VARCHAR(100) NOT NULL DEFAULT 'Default',
  `TypeID` INT NOT NULL COMMENT 'หมวดหมู่ช่าง',
  `TechnicLocation` TEXT NOT NULL,
  `IsConfirm` TINYINT NULL DEFAULT NULL,
  `Extention` VARCHAR(50) NULL,
  PRIMARY KEY (`Worker_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Star`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Star` ;

CREATE TABLE IF NOT EXISTS `project`.`Star` (
  `Worker_ID` INT NOT NULL,
  `Star` INT NOT NULL,
  `Member_ID` INT NOT NULL,
  INDEX `FK_WorkerID_idx` (`Worker_ID` ASC),
  INDEX `FK_MemberID_idx` (`Member_ID` ASC),
  CONSTRAINT `FK_WorkerID_Star`
    FOREIGN KEY (`Worker_ID`)
    REFERENCES `project`.`WorkerInformation` (`Worker_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_MemberID_Star`
    FOREIGN KEY (`Member_ID`)
    REFERENCES `project`.`MemberInformation` (`Member_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Comment` ;

CREATE TABLE IF NOT EXISTS `project`.`Comment` (
  `Comment_ID` INT NOT NULL AUTO_INCREMENT,
  `Worker_ID` INT NOT NULL COMMENT 'Id ช่างที่ถูกคอมเม้น',
  `Member_ID` INT NOT NULL COMMENT 'ID ผู้ใช้บริการที่คอมเม้น',
  `Comment` TEXT NOT NULL,
  PRIMARY KEY (`Comment_ID`),
  INDEX `FK_Worker_idx` (`Worker_ID` ASC),
  INDEX `FK_Member_idx` (`Member_ID` ASC),
  CONSTRAINT `FK_Worker_Comment`
    FOREIGN KEY (`Worker_ID`)
    REFERENCES `project`.`WorkerInformation` (`Worker_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_Member_Comment`
    FOREIGN KEY (`Member_ID`)
    REFERENCES `project`.`MemberInformation` (`Member_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Report`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Report` ;

CREATE TABLE IF NOT EXISTS `project`.`Report` (
  `Report_ID` INT NOT NULL AUTO_INCREMENT,
  `Worker_ID` INT NOT NULL COMMENT 'ID ของ ช่างที่แจ้งรีพอท',
  `Member_ID` INT NOT NULL COMMENT 'ไอดี ของสมาชิกที่แจ้งรีพอท',
  `TextReport` TEXT NULL,
  `WorkerReport` INT NOT NULL COMMENT 'ช่างที่โดนแจ้ง',
  `MemberReport` INT NOT NULL COMMENT 'สมาชิกที่โดนแจ้ง',
  PRIMARY KEY (`Report_ID`),
  INDEX `FK_Worker_Report_idx` (`Worker_ID` ASC),
  INDEX `FK_Member_Report_idx` (`Member_ID` ASC),
  CONSTRAINT `FK_Worker_Report`
    FOREIGN KEY (`Worker_ID`)
    REFERENCES `project`.`WorkerInformation` (`Worker_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Member_Report`
    FOREIGN KEY (`Member_ID`)
    REFERENCES `project`.`MemberInformation` (`Member_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Perriod`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Perriod` ;

CREATE TABLE IF NOT EXISTS `project`.`Perriod` (
  `Perriod_ID` INT NOT NULL AUTO_INCREMENT,
  `Quotation_ID` INT NOT NULL,
  `PricePerriod` INT NOT NULL COMMENT 'จำนวนเงินต่องวด',
  `Perriodcount` INT NOT NULL COMMENT 'ตัวนับงวด เช่น งวดที่เท่าไหร่',
  `JobDetail` VARCHAR(100) NOT NULL,
  `StartJobDt` DATETIME NULL,
  `FinishJobDt` DATETIME NULL,
  PRIMARY KEY (`Perriod_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Employee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Employee` ;

CREATE TABLE IF NOT EXISTS `project`.`Employee` (
  `Employee_ID` INT NOT NULL,
  `Username` VARCHAR(30) NOT NULL,
  `Password` VARCHAR(30) NOT NULL,
  `Position` VARCHAR(30) NOT NULL,
  `Fname` VARCHAR(50) NOT NULL,
  `Lname` VARCHAR(50) NOT NULL,
  `Bdate` DATE NOT NULL,
  `Address` TEXT NOT NULL,
  `ProfilePic` VARCHAR(100) NULL,
  `Phone` CHAR(10) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `Salary` FLOAT NOT NULL,
  PRIMARY KEY (`Employee_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`WorkerHistory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`WorkerHistory` ;

CREATE TABLE IF NOT EXISTS `project`.`WorkerHistory` (
  `Workhistory_ID` INT NOT NULL AUTO_INCREMENT,
  `Worker_ID` INT NOT NULL,
  `Member_ID` INT NOT NULL COMMENT 'คอลัมน์ชื่อผู้ใช้ที่ได้ทำการเรียกใช้ช่างในครั้งนั้นๆ\n',
  `Employee_ID` INT NOT NULL,
  `Perriod_ID` INT NOT NULL,
  `Quotation_ID` INT NOT NULL,
  `WorkName` VARCHAR(45) NOT NULL COMMENT 'ชื่องานช่าง',
  `WorkDetail` TEXT NOT NULL COMMENT 'ข้อมูลงานช่าง',
  `WorkPrice` INT NOT NULL,
  `IsFinish` TINYINT NOT NULL COMMENT 'done cancled reject',
  `MemberPay` CHAR(3) NOT NULL COMMENT 'สถานะการจ่ายของลูกค้า',
  `WorkerPay` CHAR(3) NOT NULL COMMENT 'สถานะการเบิกจ่าย\n',
  `Payby` TINYINT NOT NULL COMMENT 'จ่ายโดยวิธีใด',
  PRIMARY KEY (`Workhistory_ID`),
  INDEX `FK_Worker_idx` (`Worker_ID` ASC),
  INDEX `FK_Member_idx` (`Member_ID` ASC),
  INDEX `FK_Perriod_idx` (`Perriod_ID` ASC),
  INDEX `FK_Employee_idx` (`Employee_ID` ASC),
  CONSTRAINT `FK_Worker_History`
    FOREIGN KEY (`Worker_ID`)
    REFERENCES `project`.`WorkerInformation` (`Worker_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_Member_History`
    FOREIGN KEY (`Member_ID`)
    REFERENCES `project`.`MemberInformation` (`Member_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_Perriod_History`
    FOREIGN KEY (`Perriod_ID`)
    REFERENCES `project`.`Perriod` (`Perriod_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_Employee_History`
    FOREIGN KEY (`Employee_ID`)
    REFERENCES `project`.`Employee` (`Employee_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Type` ;

CREATE TABLE IF NOT EXISTS `project`.`Type` (
  `Type_ID` INT NOT NULL,
  `TypeName` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Type_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Promotion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Promotion` ;

CREATE TABLE IF NOT EXISTS `project`.`Promotion` (
  `Promotion_ID` INT NOT NULL AUTO_INCREMENT,
  `PromotionCode` CHAR(15) NOT NULL,
  `PromotionDetail` TEXT NOT NULL,
  `PromotionDiscount` FLOAT NULL,
  `PromotionPoint` INT NULL,
  PRIMARY KEY (`Promotion_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Request`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Request` ;

CREATE TABLE IF NOT EXISTS `project`.`Request` (
  `Request_ID` INT NOT NULL AUTO_INCREMENT COMMENT 'รหัสการส่งคำขอใช้บริการ',
  `Member_ID` INT NOT NULL COMMENT 'ชื่อผู้ใช้ที่ทำการขอใช้บริการ',
  `Worker_ID` INT NOT NULL COMMENT 'ชื่อผู้ใช้ของช่างที่ผู้ใช้บริการได้ส่งคำขอไปหา',
  `WorkName` VARCHAR(50) NOT NULL COMMENT 'ชื่อเคสที่ผู้ใช้เเล้วเเต่จะตั้ง',
  `RequestDetail` TEXT NULL COMMENT 'รายละเอียดเกี่ยวกับเคส',
  `WorkPic` VARCHAR(100) NULL COMMENT 'ภาพประกอบเคส',
  `Start Date/time` DATETIME NOT NULL,
  `Promotion_ID` INT NULL,
  `IsConfirmRequest` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`Request_ID`),
  INDEX `FK_tbUserInformation_idx` (`Member_ID` ASC),
  INDEX `FK_tbWorkerInfomation_idx` (`Worker_ID` ASC),
  INDEX `FK_PromotionCode_idx` (`Promotion_ID` ASC),
  CONSTRAINT `FK_tbUserInformation`
    FOREIGN KEY (`Member_ID`)
    REFERENCES `project`.`MemberInformation` (`Member_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_tbWorkerInfomation`
    FOREIGN KEY (`Worker_ID`)
    REFERENCES `project`.`WorkerInformation` (`Worker_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_PromotionCode`
    FOREIGN KEY (`Promotion_ID`)
    REFERENCES `project`.`Promotion` (`Promotion_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Quotation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Quotation` ;

CREATE TABLE IF NOT EXISTS `project`.`Quotation` (
  `Quotation_ID` INT NOT NULL AUTO_INCREMENT,
  `Worker_ID` INT NOT NULL,
  `Request_ID` INT NOT NULL COMMENT 'รูปแนบ ใบเสนอราคา',
  `Member_ID` INT NOT NULL,
  `ISConfirmQuotation` TINYINT NOT NULL,
  `Composition` VARCHAR(100) NULL COMMENT 'เก็บข้อมูล ไฟล์ , รูปภาพ ',
  `Perriod_ID` INT NULL DEFAULT NULL,
  PRIMARY KEY (`Quotation_ID`),
  INDEX `FK_tbWorkerInformation_idx` (`Worker_ID` ASC),
  INDEX `FK_Member_idx` (`Member_ID` ASC),
  INDEX `FK_Request_idx` (`Request_ID` ASC),
  INDEX `FK_Perriod_idx` (`Perriod_ID` ASC),
  CONSTRAINT `FK_Worker_Quo`
    FOREIGN KEY (`Worker_ID`)
    REFERENCES `project`.`WorkerInformation` (`Worker_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_Member_Quo`
    FOREIGN KEY (`Member_ID`)
    REFERENCES `project`.`MemberInformation` (`Member_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_Request`
    FOREIGN KEY (`Request_ID`)
    REFERENCES `project`.`Request` (`Request_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_Perriod`
    FOREIGN KEY (`Perriod_ID`)
    REFERENCES `project`.`Perriod` (`Perriod_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`ExtraPrice`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`ExtraPrice` ;

CREATE TABLE IF NOT EXISTS `project`.`ExtraPrice` (
  `WorkerTimePrice` INT NOT NULL,
  `AppPrice` INT NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`StandardJob`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`StandardJob` ;

CREATE TABLE IF NOT EXISTS `project`.`StandardJob` (
  `Job_ID` INT NOT NULL AUTO_INCREMENT,
  `Worker_ID` INT NOT NULL,
  `JobName` VARCHAR(30) NOT NULL,
  `Detail` VARCHAR(50) NOT NULL,
  `Price` INT NOT NULL,
  PRIMARY KEY (`Job_ID`),
  INDEX `FK_Worker_idx` (`Worker_ID` ASC),
  CONSTRAINT `FK_Worker_Job`
    FOREIGN KEY (`Worker_ID`)
    REFERENCES `project`.`WorkerInformation` (`Worker_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`WorkerHistory_File`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`WorkerHistory_File` ;

CREATE TABLE IF NOT EXISTS `project`.`WorkerHistory_File` (
  `Workhistory_ID` INT NOT NULL,
  `File` VARCHAR(50) NULL,
  `Filetype` VARCHAR(20) NULL,
  INDEX `FK_Worker_idx` (`Workhistory_ID` ASC),
  CONSTRAINT `FK_Worker_File`
    FOREIGN KEY (`Workhistory_ID`)
    REFERENCES `project`.`WorkerHistory` (`Workhistory_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Quotation_File`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Quotation_File` ;

CREATE TABLE IF NOT EXISTS `project`.`Quotation_File` (
  `Quotation_ID` INT NOT NULL,
  `QuotationFile` VARCHAR(45) NOT NULL,
  INDEX `FK_QutationID_idx` (`Quotation_ID` ASC),
  CONSTRAINT `FK_QutationID`
    FOREIGN KEY (`Quotation_ID`)
    REFERENCES `project`.`Quotation` (`Quotation_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Worker_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Worker_type` ;

CREATE TABLE IF NOT EXISTS `project`.`Worker_type` (
  `Type_ID` INT NOT NULL,
  `Worker_ID` INT NOT NULL,
  INDEX `FK_TypeID_idx` (`Type_ID` ASC),
  INDEX `FK_WorkerID_idx` (`Worker_ID` ASC),
  CONSTRAINT `FK_TypeID`
    FOREIGN KEY (`Type_ID`)
    REFERENCES `project`.`Type` (`Type_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_WorkerID_Type`
    FOREIGN KEY (`Worker_ID`)
    REFERENCES `project`.`WorkerInformation` (`Worker_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`News`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`News` ;

CREATE TABLE IF NOT EXISTS `project`.`News` (
  `Detail` VARCHAR(200) NOT NULL,
  `Employee_ID` INT NULL,
  INDEX `FK_Employee_idx` (`Employee_ID` ASC),
  CONSTRAINT `FK_Employee`
    FOREIGN KEY (`Employee_ID`)
    REFERENCES `project`.`Employee` (`Employee_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Quotation_Detail`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project`.`Quotation_Detail` ;

CREATE TABLE IF NOT EXISTS `project`.`Quotation_Detail` (
  `QuotationDetail_ID` INT NOT NULL AUTO_INCREMENT,
  `Quotation_ID` INT NOT NULL,
  `QutationDetail` VARCHAR(50) NOT NULL,
  `QuotationPrice` INT NOT NULL,
  PRIMARY KEY (`QuotationDetail_ID`),
  INDEX `FK_Qutation_ID_idx` (`Quotation_ID` ASC),
  CONSTRAINT `FK_Qutation_ID`
    FOREIGN KEY (`Quotation_ID`)
    REFERENCES `project`.`Quotation` (`Quotation_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

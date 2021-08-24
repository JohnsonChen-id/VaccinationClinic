----create
Create table Clinic (
ID integer,
Availability boolean,
primary key (ID));

Create table Supervisor (
ID integer,
Contact char(20),
Name char(32),
primary key (ID));

Create table Vaccine_Supplier (
Name char(32),
Contact char(20),
Country char(16),
primary key (Name));

Create table Vaccine (
ID integer,
Type char(32) not NULL,
Availability boolean,
SupplierName char(32) Not NULL,
primary key (ID),
foreign key (SupplierName) references Vaccine_Supplier(Name));

Create table Client (
ID integer,
PostalCode char(8),
Birthdate date,
Name char(32),
HealthCardNum char(16),
StaffID integer,
primary key (ID),
foreign key (StaffID) references Staff(ID));

Create table Staff (
ID integer,
Name char(32),
Shifthours char(16),
SupervisorID integer not NULL,
primary key (ID),
foreign key (SupervisorID) references Supervisor(ID));

Create table Record (
RecordID integer,
ClientID integer,
ImmunizerID integer not NULL,
ShotNum integer,
VaccineID integer,
ClinicID integer not NULL,
primary key (RecordID),
foreign key (ImmunizerID) references Staff,
(VaccineID) references vaccine(ID),
    (ClinicID) references Clinic(ID));

Create table Adverse_Reaction (
RecordID integer,
Name char(32),
Severity integer,
primary key (RecordID, Name),
foreign key (RecordID) references Record(RecordID) ON DELETE CASCADE ON CHANGE CASCADE);


-----insert

INSERT INTO `Clinic`(`ID`, `Availability`) VALUES (1, TRUE);
INSERT INTO `Clinic`(`ID`, `Availability`) VALUES (2, FALSE);
INSERT INTO `Clinic`(`ID`, `Availability`) VALUES (3, FALSE);
INSERT INTO `Clinic`(`ID`, `Availability`) VALUES (4, FALSE);
INSERT INTO `Clinic`(`ID`, `Availability`) VALUES (5, TRUE);

INSERT INTO `Supervisor`(`ID`, `Contact`, `Name`) VALUES(41,1234567890, "Tara Davidson");
INSERT INTO `Supervisor`(`ID`, `Contact`, `Name`) VALUES(12,2501111111, "John Smith");
INSERT INTO `Supervisor`(`ID`, `Contact`, `Name`) VALUES(11,7777777777, "Clear Love");
INSERT INTO `Supervisor`(`ID`, `Contact`, `Name`) VALUES(17,1111111111 , "Arthor Kim");
INSERT INTO `Supervisor`(`ID`, `Contact`, `Name`) VALUES(22, 2133233232, "Dr. Luthor");

INSERT INTO `Vaccine_Supplier`(`Name`, `Contact`, `Country`) VALUES ("Pfizer Inc.","abcd@pfrizer.com","USA");
INSERT INTO `Vaccine_Supplier`(`Name`, `Contact`, `Country`) VALUES ("Sinopharm", "acde@sinopharm.cn", "China");
INSERT INTO `Vaccine_Supplier`(`Name`, `Contact`, `Country`) VALUES ("Moderna Inc.", "asas@moderna.com", "USA");
INSERT INTO `Vaccine_Supplier`(`Name`, `Contact`, `Country`) VALUES ("Janssen Pharmaceuticals", "asss@jassenpharm.com", "Belgium");
INSERT INTO `Vaccine_Supplier`(`Name`, `Contact`, `Country`) VALUES ("AstraZeneca Canada Inc", "someone@astra.ca", "Canada");

INSERT INTO `Vaccine`(`ID`, `Type`, `Availability`, `SupplierName`) VALUES (322,"AstraZeneca", "1", "AstraZeneca Canada Inc");
INSERT INTO `Vaccine`(`ID`, `Type`, `Availability`, `SupplierName`) VALUES (369,"Pfizer", "1", "Pfizer Inc.");
INSERT INTO `Vaccine`(`ID`, `Type`, `Availability`, `SupplierName`) VALUES (345,"Sinopharm-BBIBP", "0", "Sinopharm");
INSERT INTO `Vaccine`(`ID`, `Type`, `Availability`, `SupplierName`) VALUES (317,"Janssen", "0", "Janssen Pharmaceuticals");
INSERT INTO `Vaccine`(`ID`, `Type`, `Availability`, `SupplierName`) VALUES (300,"Moderna", "1", "Moderna Inc.");

INSERT INTO `Staff`(`ID`, `Name`, `Shifthours`, `SupervisorID`) VALUES (3197,"Ian Willson", "10am-5pm", 11);
INSERT INTO `Staff`(`ID`, `Name`, `Shifthours`, `SupervisorID`) VALUES (4210,"John Duke", "12pm-4pm", 41);
INSERT INTO `Staff`(`ID`, `Name`, `Shifthours`, `SupervisorID`) VALUES (2149,"Rick Robinson", "8am-1pm", 12);
INSERT INTO `Staff`(`ID`, `Name`, `Shifthours`, `SupervisorID`) VALUES (5499,"Kate Keith", "12pm-4pm", 41);
INSERT INTO `Staff`(`ID`, `Name`, `Shifthours`, `SupervisorID`) VALUES (3568,"Dan Wang", "2pm-6pm", 22);

INSERT INTO `Client`(`ID`, `PostalCode`, `Birthdate`, `Name`, `HealthCardNum`, `StaffID`) VALUES (31279,"V6T1Z4",19870707, "Aby Bayson", "X122223", 3197);
INSERT INTO `Client`(`ID`, `PostalCode`, `Birthdate`, `Name`, `HealthCardNum`, `StaffID`) VALUES (23491,"V6T1Z4",19820501, "Dyson Washer", "X126796", 4210);
INSERT INTO `Client`(`ID`, `PostalCode`, `Birthdate`, `Name`, `HealthCardNum`, `StaffID`) VALUES (34129,"V6T1Z2",19960405, "Halo Loken", "E314550", 5499);
INSERT INTO `Client`(`ID`, `PostalCode`, `Birthdate`, `Name`, `HealthCardNum`, `StaffID`) VALUES (26589,"V6T1Z4",20000107, "Jacky Johnson", "V546147", 3197);
INSERT INTO `Client`(`ID`, `PostalCode`, `Birthdate`, `Name`, `HealthCardNum`, `StaffID`) VALUES (32516,"V6T0A2",20010904, "Matty Schuler", "V34537", 3568);

INSERT INTO `Record`(`RecordID`, `ClientID`, `ImmunizerID`, `ShotNum`, `ClinicID`, ‘VaccineID’) VALUES (676495,31279,3197, 1, 1,300);
INSERT INTO `Record`(`RecordID`, `ClientID`, `ImmunizerID`, `ShotNum`, `ClinicID`, ‘VaccineID’) VALUES (324917,23491,4210, 2, 1,300);
INSERT INTO `Record`(`RecordID`, `ClientID`, `ImmunizerID`, `ShotNum`, `ClinicID`, ‘VaccineID’) VALUES (521437,31279,3197, 1, 2,317);
INSERT INTO `Record`(`RecordID`, `ClientID`, `ImmunizerID`, `ShotNum`, `ClinicID`, ‘VaccineID’) VALUES (499499,34129,4210, 0, 1,345);
INSERT INTO `Record`(`RecordID`, `ClientID`, `ImmunizerID`, `ShotNum`, `ClinicID`, ‘VaccineID’) VALUES (542637,32516,5499, 2, 3,300);

INSERT INTO `Adverse_Reaction`(`RecordID`, `Name`, `Severity`) VALUES (676495,"Soreness", 0);
INSERT INTO `Adverse_Reaction`(‘RecordID`, `Name`, `Severity`) VALUES (521437,"Headache",3);
INSERT INTO `Adverse_Reaction`(`RecordID`, `Name`, `Severity`) VALUES (521437,"Fatigue", 2);
INSERT INTO `Adverse_Reaction`(`RecordID`, `Name`, `Severity`) VALUES (499499,"Joint Pain", 2);
INSERT INTO `Adverse_Reaction`(`RecordID`, `Name`, `Severity`) VALUES (676495,"Fever",4);

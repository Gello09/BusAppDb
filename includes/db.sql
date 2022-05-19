CREATE TABLE user (
	userId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	userFullName varchar(128) NOT NULL,
	userEmail varchar(128) NOT NULL,
	userMobileNumber varchar(128) NOT NULL,
	userPassword varchar(128) NOT NULL
);

CREATE TABLE bookingDetail (
	bookingDetailId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	bookingDetailEmail varchar(128) NOT NULL,
	bookingDetailDestination varchar(128) NOT NULL,
	bookingDetailDate varchar(128) NOT NULL,
	bookingDetailTime varchar(128) NOT NULL,
	bookingDetailSeatNumber varchar(128) NOT NULL,
	bookingDetailPaymentReceipt varchar(128) NOT NULL,
	bookingDetailAction varchar(128) NOT NULL
);

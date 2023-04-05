 CREATE TABLE Company(companyName CHAR(80) PRIMARY KEY, product CHAR(80), ticker CHAR(10) UNIQUE, country CHAR(80) NOT NULL, growthRate NUMERIC(7, 2), ceo CHAR(80) NOT NULL, ceoDateStarted char(11));
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Apple', 'Technological Hardware', 'AAPL',  'USA', 0.15, 'Tim Cook', '24-AUG-2011');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Microsoft', 'Technological Software', 'MSFT', 'USA', 0.12, 'Satya Nadella', '04-FEB-2014');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Google', 'Technological Software', 'GOOGL', 'USA', 0.16, 'Sundar Pichai', '02-OCT-2015');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Meta', 'Technological Software', 'META', 'USA', 0.12, 'Mark Zuckerberg', '01-JUL-2004');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Amazon', 'E-commerce', 'AMZN', 'USA', 0.18, 'Andy Jassy', '05-JUL-2021');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Netflix', 'Streaming Service', 'NFLX', 'USA', 0.14, 'Ted Sarandos', '14-JUL-2020');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Tesla', 'Automobiles', 'TSLA', 'USA', 0.10, 'Elon Musk', '02-OCT-2008');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Rivian', 'Automobiles', 'RIVN', 'USA', 0.05, 'RJ Scaringe', '07-AUG-2009');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Instagram', 'Social Media', 'FB', 'USA', 0.14, 'Adam Mosseri', '01-OCT-2018');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Lockheed Martin Corp', 'Aerospace', 'LMT', 'USA', 0.18, 'James Taiclet', '15-JUN-2020');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('United Health', 'Insurance', 'UNH', 'USA', 0.14, 'Andrew Witty', '03-FEB-2021');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Barrick Gold', 'Gold', 'ABX', 'Canada', 0.19, 'Mark Bristow', '01-JAN-2019');
                INSERT INTO Company(companyName, product, ticker, country, growthRate, ceo, ceoDateStarted) VALUES('Kennedy-Wilson Holdings Inc', 'Investment', 'KW', 'USA', 0.19, 'William McMorrow', '09-APR-1998');
             
 CREATE TABLE Investor(investorName CHAR(80) PRIMARY KEY, isVentureCapitalist NUMBER(1));
                INSERT INTO Investor(investorName, isVentureCapitalist) VALUES('Warren Buffett', 0);
                INSERT INTO Investor(investorName, isVentureCapitalist) VALUES('Philip Fisher', 0);
                INSERT INTO Investor(investorName, isVentureCapitalist) VALUES('Benjamin Graham', 0);
                INSERT INTO Investor(investorName, isVentureCapitalist) VALUES('Bain Capital', 1);
                INSERT INTO Investor(investorName, isVentureCapitalist) VALUES('GV', 1);

 CREATE TABLE CEO (ceoName char(80) PRIMARY KEY, age int, gender char(80), educationLevel char(80));
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Sundar Pichai', 50, 'MAN', 'Masters Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Tim Cook', 62, 'MAN', 'Masters Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Satya Nadella', 55, 'MAN', 'Masters Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Mary Barra', 61, 'WOMAN', 'Masters Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('RJ Scaringe', 40, 'MAN', 'Doctorate');
                INSERT INTO CEO(ceoName, age, gender) VALUES('Bill Gates', 67, 'MAN');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Andrew Witty', 58, 'MAN', 'Bachelors Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Ted Sarandos', 58, 'MAN', 'Bachelors Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Andy Jassy', 55, 'MAN', 'Masters Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Adam Mosseri', 40, 'MAN', 'Bachelors Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Mark Zuckerberg', 42, 'MAN', 'Masters Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Elon Musk', 45, 'MAN', 'Masters Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Kiichiro Toyoda', 95, 'MAN', 'Bachelors Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('John Warnock', 67, 'MAN', 'Bachelors Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Diane Greene', 37, 'WOMAN', 'Masters Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Maxim Kolomeychenko', 51, 'MAN', 'PHD Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Guido Sacchi', 60, 'MAN', 'PHD Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Long Phan', 52, 'MAN', 'PHD Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Ivan Klimek', 45, 'MAN', 'PHD Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('James Taiclet', 62, 'MAN', 'Masters Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('Mark Bristow', 64, 'MAN', 'PHD Degree');
                INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('William McMorrow', 75, 'MAN', 'Masters Degree');

 CREATE TABLE Industry (industryName char(80) PRIMARY KEY, averagePERatio int, averageRevenue int);
                INSERT INTO Industry(industryName, averagePERatio, averageRevenue) VALUES('Mining', 17, 20000);
                INSERT INTO Industry(industryName, averagePERatio, averageRevenue) VALUES('Health', 25, 15000);
                INSERT INTO Industry(industryName, averagePERatio, averageRevenue) VALUES('Defense', 13, 8000);
                INSERT INTO Industry(industryName, averagePERatio, averageRevenue) VALUES('Technology', 23, 12000);
                INSERT INTO Industry(industryName, averagePERatio, averageRevenue) VALUES('Real Estate', 10, 9000);
                INSERT INTO Industry(industryName, averagePERatio, averageRevenue) VALUES('Automobiles', 13, 20000);

 CREATE TABLE ActiveIn (companyName char(80), industryName char(80), activeSince char(80), PRIMARY KEY(companyName, industryName));
                INSERT INTO ActiveIn(companyName, industryName, activeSince) VALUES('Apple', 'Technology', '01-MAR-1976');
                INSERT INTO ActiveIn(companyName, industryName, activeSince) VALUES('Microsoft', 'Technology', '04-JUL-1975');
                INSERT INTO ActiveIn(companyName, industryName, activeSince) VALUES('Google', 'Technology', '04-SEP-1998');
                INSERT INTO ActiveIn(companyName, industryName, activeSince) VALUES('Lockheed Martin Corp', 'Defense', '01-APR-1990');
                INSERT INTO ActiveIn(companyName, industryName, activeSince) VALUES('United Health', 'Health', '02-DEC-1994');
                INSERT INTO ActiveIn(companyName, industryName, activeSince) VALUES('Barrick Gold', 'Mining', '22-FEB-1984');
                INSERT INTO ActiveIn(companyName, industryName, activeSince) VALUES('Kennedy-Wilson Holdings Inc', 'Real Estate', '01-JUN-1971');
                INSERT INTO ActiveIn(companyName, industryName, activeSince) VALUES('Tesla', 'Automobiles', '01-JUL-2003');
                INSERT INTO ActiveIn(companyName, industryName, activeSince) VALUES('Rivian', 'Automobiles', '08-JUN-2009');

 CREATE TABLE Invests (investorName char(80), companyName char(80), amountInvested int, PRIMARY KEY(investorName, companyName));
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Warren Buffett', 'Apple', 2002000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Warren Buffett', 'Microsoft', 1505000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Warren Buffett', 'Google', 860000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Warren Buffett', 'Tesla', 1250000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Philip Fisher', 'Apple', 900000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Philip Fisher', 'Lockheed Martin Corp', 220000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Philip Fisher', 'United Health', 220000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Philip Fisher', 'Instagram', 2003000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Benjamin Graham', 'Kennedy-Wilson Holdings Inc', 1500000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Benjamin Graham', 'Rivian', 1500000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Bain Capital', 'Tesla', 2004000);
                INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('Bain Capital', 'Barrick Gold', 2004000);

 CREATE TABLE Country (countryName CHAR(80), democracyIndex INT, primaryLanguage CHAR(80) NOT NULL, PRIMARY KEY (countryName));
                INSERT INTO Country(countryName, democracyIndex, primaryLanguage) VALUES('USA', 8.88, 'English');
                INSERT INTO Country(countryName, democracyIndex, primaryLanguage) VALUES('Canada', 7.85, 'English');
                INSERT INTO Country(countryName, democracyIndex, primaryLanguage) VALUES('England', 8.28, 'English');
                INSERT INTO Country(countryName, democracyIndex, primaryLanguage) VALUES('Turkey', 4.35, 'Turkish');
                INSERT INTO Country(countryName, democracyIndex, primaryLanguage) VALUES('Portugal', 7.95, 'Portuguese');

 CREATE TABLE Language (langName CHAR(80), culture CHAR(80) NOT NULL, PRIMARY KEY (langName));
                INSERT INTO Language(langName, culture) VALUES('English', 'Western');
                INSERT INTO Language(langName, culture) VALUES('Turkish', 'Islamic');
                INSERT INTO Language(langName, culture) VALUES('Portuguese', 'Roman Catholic');
                INSERT INTO Language(langName, culture) VALUES('Spanish', 'Western European');
                INSERT INTO Language(langName, culture) VALUES('Arabic', 'Islamic');

 CREATE TABLE Education (educationLevel CHAR(80), netWorth INT, PRIMARY KEY (educationLevel));
                INSERT INTO Education(educationLevel, netWorth) VALUES('Highschool Diploma', 3500000);
                INSERT INTO Education(educationLevel, netWorth) VALUES('Bachelors Degree', 2500000);
                INSERT INTO Education(educationLevel, netWorth) VALUES('Masters Degree', 2400000);
                INSERT INTO Education(educationLevel, netWorth) VALUES('PHD Degree', 3000000);
                INSERT INTO Education(educationLevel, netWorth) VALUES('Doctorate', 2000000);
                INSERT INTO Education(educationLevel, netWorth) VALUES('Apprenticeship Certificate', 1500000);

 CREATE TABLE Culture (cultureName CHAR(80), masculinityVsFemininity INT NOT NULL, longVsShortTerm INT NOT NULL, indulgenceVsRestraint INT, PRIMARY KEY (cultureName));
                INSERT INTO Culture(cultureName, masculinityVsFemininity, longVsShortTerm, indulgenceVsRestraint) VALUES('Western', 62, 29, 83);
                INSERT INTO Culture(cultureName, masculinityVsFemininity, longVsShortTerm, indulgenceVsRestraint) VALUES('Islamic', 52, 12, 60);
                INSERT INTO Culture(cultureName, masculinityVsFemininity, longVsShortTerm, indulgenceVsRestraint) VALUES('Roman Catholic', 31, 19, 57);
                INSERT INTO Culture(cultureName, masculinityVsFemininity, longVsShortTerm, indulgenceVsRestraint) VALUES('Western European', 42, 29, 76);
                INSERT INTO Culture(cultureName, masculinityVsFemininity, longVsShortTerm, indulgenceVsRestraint) VALUES('Han', 66, 118, 39);


CREATE TABLE lvStoUa (
    longVsShortTerm INT,
    uncertaintyAvoidance INT,
    PRIMARY KEY (longVsShortTerm)
);

INSERT INTO lvStoUa(longVsShortTerm, uncertaintyAvoidance)
VALUES(29, 46);

INSERT INTO lvStoUa(longVsShortTerm, uncertaintyAvoidance)
VALUES(12, 54);

INSERT INTO lvStoUa(longVsShortTerm, uncertaintyAvoidance)
VALUES(19, 44);

INSERT INTO lvStoUa(longVsShortTerm, uncertaintyAvoidance)
VALUES(39, 42);

INSERT INTO lvStoUa(longVsShortTerm, uncertaintyAvoidance)
VALUES(118, 40);

CREATE TABLE mvfToIvcPd (
	masculinityVsFemininity INT,
	IndividualismVsCollectivism INT,
	powerDistance INT,
	PRIMARY KEY (masculinityVsFemininity)
);

INSERT INTO mvfToIvcPd(masculinityVsFemininity, IndividualismVsCollectivism, powerDistance)
VALUES(62, 91, 40);

INSERT INTO mvfToIvcPd(masculinityVsFemininity, IndividualismVsCollectivism, powerDistance)
VALUES(52, 38, 80);

INSERT INTO mvfToIvcPd(masculinityVsFemininity, IndividualismVsCollectivism, powerDistance)
VALUES(31, 27, 63);

INSERT INTO mvfToIvcPd(masculinityVsFemininity, IndividualismVsCollectivism, powerDistance)
VALUES(42, 51, 57);

INSERT INTO mvfToIvcPd(masculinityVsFemininity, IndividualismVsCollectivism, powerDistance)
VALUES(66, 20, 80);

CREATE TABLE Founder (
	founderName CHAR(80) NOT NULL,
	foundingYear char(80),
	isSoleFounder char(5),
	PRIMARY KEY (founderName)
);

INSERT INTO Founder(founderName, foundingYear, isSoleFounder)
VALUES('Mark Zuckerberg', '2004', 'F');

INSERT INTO Founder(founderName, foundingYear, isSoleFounder)
VALUES('Elon Musk', '2002', 'T');

INSERT INTO Founder(founderName, foundingYear, isSoleFounder)
VALUES('Kiichiro Toyoda', '1937', 'T');

INSERT INTO Founder(founderName, foundingYear, isSoleFounder)
VALUES('John Warnock', '1982', 'F');

INSERT INTO Founder(founderName, foundingYear, isSoleFounder)
VALUES('Diane Greene', '1998', 'F');

CREATE TABLE Liabilities (
	assets INT,
	liabilities_amount INT NOT NULL,
	PRIMARY KEY (assets)
);

INSERT INTO Liabilities(assets, liabilities_amount)
VALUES(100, 10000000);

INSERT INTO Liabilities(assets, liabilities_amount)
VALUES(235, 21000000);

INSERT INTO Liabilities(assets, liabilities_amount)
VALUES(55, 520000);

INSERT INTO Liabilities(assets, liabilities_amount)
VALUES(70, 700000);

INSERT INTO Liabilities(assets, liabilities_amount)
VALUES(180, 20000000);


CREATE TABLE Finances (
	fid INT,
	revenue INT NOT NULL,
	assets INT NOT NULL,
	ebtida INT,
	reportDate char(80),
	companyName CHAR(80),
	PRIMARY KEY(fid)
);

INSERT INTO Finances(fid, revenue, assets, ebtida, reportDate, companyName)
VALUES(100, 10000000, 70, 11000000, '12-JUL-2012', 'Apple');

INSERT INTO Finances(fid, revenue, assets, ebtida, reportDate, companyName)
VALUES(101, 9000000, 55, 10500000, '16-MAR-2017', 'Google');

INSERT INTO Finances(fid, revenue, assets, ebtida, reportDate, companyName)
VALUES(102, 23000000, 180, 25000000, '20-SEP-2007', 'Meta');

INSERT INTO Finances(fid, revenue, assets, ebtida, reportDate, companyName)
VALUES(103, 22000000, 100, 11000000, '21-NOV-2019', 'Amazon');

INSERT INTO Finances(fid, revenue, assets, ebtida, reportDate, companyName)
VALUES(104, 2000000, 235, 2500000, '11-DEC-219', 'Netflix');

CREATE TABLE Earnings (
	revenue INT,
	earnings INT,
	PRIMARY KEY (revenue)
);

INSERT INTO Earnings(revenue, earnings)
VALUES(10000000, 5000000);

INSERT INTO Earnings(revenue, earnings)
VALUES(23000000, 11000000);

INSERT INTO Earnings(revenue, earnings)
VALUES(9000000, 450000);

INSERT INTO Earnings(revenue, earnings)
VALUES(2000000, 1000000);

INSERT INTO Earnings(revenue, earnings)
VALUES(22000000, 1200000);

CREATE TABLE Revenue (
	averageRevenue INT,
	totalRevenue INT,
	PRIMARY KEY (averageRevenue)
);

INSERT INTO Revenue(averageRevenue, totalRevenue)
VALUES(20000, 100000);

INSERT INTO Revenue(averageRevenue, totalRevenue)
VALUES(15000, 75000);

INSERT INTO Revenue(averageRevenue, totalRevenue)
VALUES(8000, 32000);

INSERT INTO Revenue(averageRevenue, totalRevenue)
VALUES(12000, 60000);

INSERT INTO Revenue(averageRevenue, totalRevenue)
VALUES(9000, 36000);

CREATE TABLE Firms (
	averageRevenue INT,
	numOfFirms INT,
	PRIMARY KEY (averageRevenue)
);

INSERT INTO Firms(averageRevenue, numOfFirms)
VALUES(20000, 5);

INSERT INTO Firms(averageRevenue, numOfFirms)
VALUES(15000, 5);

INSERT INTO Firms(averageRevenue, numOfFirms)
VALUES(8000, 4);

INSERT INTO Firms(averageRevenue, numOfFirms)
VALUES(12000, 5);

INSERT INTO Firms(averageRevenue, numOfFirms)
VALUES(9000, 4);

CREATE TABLE StockExchange(
	exchangeName CHAR(80),
	PRIMARY KEY (exchangeName)
);

INSERT INTO StockExchange(exchangeName)
VALUES('New York Stock Exchange');

INSERT INTO StockExchange(exchangeName)
VALUES('Nasdaq');

INSERT INTO StockExchange(exchangeName)
VALUES('Shanghai Stock Exchange');

INSERT INTO StockExchange(exchangeName)
VALUES('Euronext');

INSERT INTO StockExchange(exchangeName)
VALUES('Japan Exchange Group');

CREATE TABLE AcquiredCompany(
	acqCompanyName CHAR(80),
	priceAtAqusition INT,
	yearAquired char(4),
	PRIMARY KEY (acqCompanyName)
);

INSERT INTO AcquiredCompany(acqCompanyName, priceAtAqusition, yearAquired)
VALUES('Instagram', 1000, 2012);

INSERT INTO AcquiredCompany(acqCompanyName, priceAtAqusition, yearAquired)
VALUES('Google', 1650, 2015);

CREATE TABLE StockInfo(
	stockPrice FLOAT,
	sharesOutstanding INT,
	marketCap INT,
	PRIMARY KEY (stockPrice)
);

INSERT INTO StockInfo(stockPrice, sharesOutstanding, marketCap)
VALUES(1.12,12333456,1408877771);

INSERT INTO StockInfo(stockPrice, sharesOutstanding, marketCap)
VALUES(2.82,854037536,13822370);

INSERT INTO StockInfo(stockPrice, sharesOutstanding, marketCap)
VALUES(87.82,745494,2420148299);

INSERT INTO StockInfo(stockPrice, sharesOutstanding, marketCap)
VALUES(0.98,1434958316,8879417430);

INSERT INTO StockInfo(stockPrice, sharesOutstanding, marketCap)
VALUES(9.57,927538852,65409821);

CREATE TABLE ListedOn(
	exchangeName CHAR(80),
    companyName CHAR(80),
	dateListed char(80),
	stockPrice FLOAT,
	PRIMARY KEY (exchangeName, companyName)
);

INSERT INTO ListedOn(exchangeName, companyName,	dateListed,	stockPrice)
VALUES('New York Stock Exchange', 'Apple', '24-AUG-2011', 1.12);

INSERT INTO ListedOn(exchangeName, companyName,	dateListed,	stockPrice)
VALUES('New York Stock Exchange', 'Microsoft', '04-FEB-2014', 2.82);

INSERT INTO ListedOn(exchangeName, companyName,	dateListed,	stockPrice)
VALUES('New York Stock Exchange', 'Google', '02-OCT-2015', 87.82);

INSERT INTO ListedOn(exchangeName, companyName,	dateListed,	stockPrice)
VALUES('New York Stock Exchange', 'Tesla', '02-OCT-2008', 0.98);

INSERT INTO ListedOn(exchangeName, companyName,	dateListed,	stockPrice)
VALUES('New York Stock Exchange', 'Rivian', '07-AUG-2009', 9.57);

ALTER TABLE Company ADD CONSTRAINT company_fk_country FOREIGN KEY (country) REFERENCES Country (countryName) ON DELETE CASCADE;
ALTER TABLE Company ADD CONSTRAINT company_fk_ceo FOREIGN KEY (ceo) REFERENCES CEO (ceoName) ON DELETE CASCADE;
ALTER TABLE Country ADD CONSTRAINT country_fk FOREIGN KEY (primaryLanguage) REFERENCES Language (langName) ON DELETE CASCADE;
ALTER TABLE Language ADD CONSTRAINT language_fk FOREIGN KEY (culture) REFERENCES Culture(cultureName) ON DELETE CASCADE;
ALTER TABLE Culture ADD CONSTRAINT culture_mvf_fk FOREIGN KEY (masculinityVsFemininity) REFERENCES mvfToIvcPd(masculinityVsFemininity) ON DELETE CASCADE;
ALTER TABLE Culture ADD CONSTRAINT culture_lvs_fk FOREIGN KEY (longVsShortTerm) REFERENCES lvStoUa(longVsShortTerm) ON DELETE CASCADE;
ALTER TABLE CEO ADD CONSTRAINT ceo_fk FOREIGN KEY(educationLevel) REFERENCES Education(educationLevel) ON DELETE CASCADE;
ALTER TABLE Founder ADD CONSTRAINT founder_fk FOREIGN KEY (founderName) REFERENCES CEO(ceoName) ON DELETE CASCADE;
ALTER TABLE Finances ADD CONSTRAINT finances_rev_fk FOREIGN KEY (revenue) REFERENCES Earnings(revenue) ON DELETE CASCADE;
ALTER TABLE Finances ADD CONSTRAINT finances_assets_fk FOREIGN KEY (assets) REFERENCES Liabilities(assets) ON DELETE CASCADE;
ALTER TABLE Finances ADD CONSTRAINT finances_company_fk FOREIGN KEY (companyName) REFERENCES Company(companyName) ON DELETE CASCADE;
ALTER TABLE AcquiredCompany ADD CONSTRAINT acq_company_fk FOREIGN KEY (acqCompanyName) REFERENCES Company(companyName) ON DELETE CASCADE;
ALTER TABLE ActiveIn ADD CONSTRAINT active_comp_fk FOREIGN KEY (companyName) REFERENCES Company(companyName) ON DELETE CASCADE;
ALTER TABLE ActiveIn ADD CONSTRAINT active_indus_fk FOREIGN KEY (industryName) REFERENCES Industry(industryName) ON DELETE CASCADE;
ALTER TABLE ListedOn ADD CONSTRAINT listed_exch_fk FOREIGN KEY (exchangeName) REFERENCES StockExchange(exchangeName) ON DELETE CASCADE;
ALTER TABLE ListedOn ADD CONSTRAINT listed_comp_fk FOREIGN KEY (companyName) REFERENCES Company(companyName) ON DELETE CASCADE;
ALTER TABLE ListedOn ADD CONSTRAINT listed_stock_fk FOREIGN KEY (stockPrice) REFERENCES StockInfo(stockPrice) ON DELETE CASCADE;
ALTER TABLE Invests ADD CONSTRAINT invest_inv_fk FOREIGN KEY (investorName) REFERENCES Investor(investorName) ON DELETE CASCADE;
ALTER TABLE Invests ADD CONSTRAINT invest_comp_fk FOREIGN KEY (companyName) REFERENCES Company(companyName) ON DELETE CASCADE;
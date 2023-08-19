-- This statement adds a foreign key constraint named FK_Referee to the epl_matches table.
ALTER TABLE epl_matches
ADD CONSTRAINT FK_Referee
-- This line specifies that the constraint is a foreign key constraint, and that it references the RefereeID column in the referees table.
FOREIGN KEY (Referee)
REFERENCES referees (RefereeID)
-- This line specifies that if a referee is deleted from the referees table, the Referee column in the epl_matches table will be set to NULL.
ON DELETE SET NULL;


-- This statement adds a foreign key constraint named FK_HomeTeam to the epl_matches table.
ALTER TABLE epl_matches
ADD CONSTRAINT FK_HomeTeam
-- This line specifies that the constraint is a foreign key constraint, and that it references the ClubID column in the clubs table.
FOREIGN KEY (HomeTeam)
REFERENCES clubs (ClubID)
-- This line specifies that if a club is deleted from the clubs table, the HomeTeam column in the epl_matches table will be set to NULL.
ON DELETE SET NULL;


-- This statement adds a foreign key constraint named FK_AwayTeam to the epl_matches table.
ALTER TABLE epl_matches
ADD CONSTRAINT FK_AwayTeam
-- This line specifies that the constraint is a foreign key constraint, and that it references the ClubID column in the clubs table.
FOREIGN KEY (AwayTeam)
REFERENCES clubs (ClubID)
-- This line specifies that if a club is deleted from the clubs table, the AwayTeam column in the epl_matches table will be set to NULL.
ON DELETE SET NULL;



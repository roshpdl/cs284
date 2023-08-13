SELECT 
  md.id, 
  md.Season, 
  md.Date, 
  rd.RefereeName, 
  ht.ClubName AS HomeTeamName, 
  at.ClubName AS AwayTeamName, 
  md.Fulltime, 
  md.Halftime, 
  md.HomeGoals, 
  md.HomeGoalsHalftime, 
  md.HomeShots, 
  md.HomeShotsOnTarget, 
  md.HomeCorners, 
  md.HomeFouls, 
  md.HomeYellowCards, 
  md.HomeRedCards, 
  md.AwayGoals, 
  md.AwayGoalsHalftime, 
  md.AwayShots, 
  md.AwayShotsOnTarget, 
  md.AwayCorners, 
  md.AwayFouls, 
  md.AwayYellowCards, 
  md.AwayRedCards
FROM 
  epl_matches as md 
  JOIN referees as rd ON md.Referee = rd.RefereeID 
  JOIN clubs as ht ON md.HomeTeam = ht.ClubID 
  JOIN clubs as at ON md.AwayTeam = at.ClubID

Order by md.id
Limit 10;
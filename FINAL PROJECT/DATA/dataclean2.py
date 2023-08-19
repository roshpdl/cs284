import csv

# Read the data from the original CSV file
with open('data_with_referee_ids.csv', 'r') as file:
    reader = csv.DictReader(file)
    data = [row for row in reader]

# Create a set of unique club names
club_names = set()
for row in data:
    home_team = row['HomeTeam'].strip().lower().replace('\n', '').replace('"', '')
    away_team = row['AwayTeam'].strip().lower().replace('\n', '').replace('"', '')
    club_names.add(home_team)
    club_names.add(away_team)

# Create a dictionary of unique club names and their corresponding unique club IDs
club_dict = {}
for idx, club_name in enumerate(club_names, start=1):
    club_dict[club_name] = idx

# Write the unique club IDs and club names to a new CSV file
with open('teams.csv', 'w', newline='') as file:
    writer = csv.writer(file)
    writer.writerow(['ClubID', 'ClubName'])
    for club_name, club_id in club_dict.items():
        writer.writerow([club_id, club_name.capitalize()])

# Update the 'HomeTeam' and 'AwayTeam' columns with unique club IDs in the original data
for row in data:
    home_team = row['HomeTeam'].strip().lower().replace('\n', '').replace('"', '')
    away_team = row['AwayTeam'].strip().lower().replace('\n', '').replace('"', '')
    row['HomeTeam'] = club_dict[home_team]
    row['AwayTeam'] = club_dict[away_team]

# Write the updated data to a new CSV file
with open('new_data.csv', 'w', newline='') as file:
    fieldnames = reader.fieldnames
    writer = csv.DictWriter(file, fieldnames=fieldnames)
    writer.writeheader()
    writer.writerows(data)

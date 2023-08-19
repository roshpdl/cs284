import csv

# Read the CSV data
with open('premierleaguedata.csv', 'r') as file:
    reader = csv.DictReader(file)
    rows = list(reader)

# Extract referee names and assign unique IDs
referees = set()
for row in rows:
    referees.add(row['Referee'].strip().replace('\n', '').replace('"', ''))

referee_id_map = {}
for i, referee in enumerate(referees, start=1):
    referee_id_map[referee] = i

# Replace referee names with IDs in the CSV file
for row in rows:
    row['Referee'] = referee_id_map[row['Referee'].strip().replace('\n', '').replace('"', '')]

# Write the updated data back to the original CSV file
with open('data_with_referee_ids.csv', 'w', newline='') as file:
    fieldnames = rows[0].keys()
    writer = csv.DictWriter(file, fieldnames=fieldnames)
    writer.writeheader()
    writer.writerows(rows)

# Create a new CSV file with referee IDs and names
with open('referee_ids.csv', 'w', newline='') as file:
    fieldnames = ['RefereeID', 'RefereeName']
    writer = csv.DictWriter(file, fieldnames=fieldnames)
    writer.writeheader()
    for referee, referee_id in referee_id_map.items():
        writer.writerow({'RefereeID': referee_id, 'RefereeName': referee})

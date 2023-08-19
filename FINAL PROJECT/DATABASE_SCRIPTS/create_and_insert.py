'''
This script creates a table in the database and uploads data from a CSV file to the table.
It assumes that the first line of the CSV file contains the column names.
You need to change the values of the variables user, password, and database to your own values.
Also, you need to change the path to the CSV file.
The script is written for Python 3.6 or higher and requires the mysql.connector module.

@Author: Roshan Poudel
@Date: April 23, 2023
@Version: 1.0

IMPORTANT: THIS SCRIPT WILL DELETE THE TABLE IF IT ALREADY EXISTS IN THE DATABASE.
'''

import mysql.connector

# define a function to create a table and upload data from a CSV file
def create_table_and_upload_data(connection, cursor, table_name, csv_file_path, varchar_list=[], date_list=[], Primary_key=""):
    # read the CSV file and split it into lines
    with open(csv_file_path) as f:
        lines = f.readlines()

    # get the column names from the first line
    columns = tuple(lines[0].strip().split(','))
    
    mystr = "("

    if Primary_key == "":
        mystr += "id INT AUTO_INCREMENT PRIMARY KEY, "

    for item in columns:
        if item in varchar_list:
            mystr += item + " VARCHAR(255),"
        elif item in date_list:
            mystr += item + " DATE,"
        else:
            mystr += item + " INT,"

    mystr = mystr[:-1]

    if Primary_key != "":
        mystr += f", PRIMARY KEY ({Primary_key})"

    mystr += ")"

    # drop the table if it already exists
    query = f"DROP TABLE IF EXISTS {table_name}"
    cursor.execute(query)

    # create a SQL query to create a table with the appropriate columns
    query = f"CREATE TABLE {table_name} {mystr}"

    # execute the SQL query
    cursor.execute(query)
    
    columns_str = ",".join(columns)

    # loop through each row in the lines and upload it to the table
    for line in lines[1:]:
        values = tuple(line.strip().split(','))
        placeholders = ', '.join(['%s'] * len(values))
        query = f"INSERT INTO {table_name} ({columns_str}) VALUES ({placeholders})"
        cursor.execute(query, values)

        # query = f"INSERT INTO {table_name} (Season,Date,Referee_id,HomeTeam_id,AwayTeam_id,Fulltime,Halftime,HomeGoals,HomeGoalsHalftime,HomeShots,HomeShotsOnTarget,HomeCorners,HomeFouls,HomeYellowCards,HomeRedCards,AwayGoals,AwayGoalsHalftime,AwayShots,AwayShotsOnTarget,AwayCorners,AwayFouls,AwayYellowCards,AwayRedCards) VALUES {values}"
        # print(query)
        # cursor.execute(query)

    # commit the changes to the database
    connection.commit()

def main():
    #establish a connection to MySQl server
    conn = mysql.connector.connect(user="pouder0_ADM",
                                   password="sewanee",
                                   host="warren.sewanee.edu",
                                   database="pouder0")

    # create a cursor object
    curs = conn.cursor()

    # call the function for each CSV file
    create_table_and_upload_data(connection=conn,
                                 cursor = curs,
                                 table_name="epl_matches",
                                 csv_file_path="../DATA/new_data.csv",
                                 varchar_list=["Season", "FullTime", "HalfTime"],
                                 date_list=["Date"])
    
    create_table_and_upload_data(connection=conn,
                                 cursor=curs,
                                 table_name="referees",
                                 csv_file_path="../DATA/referee_ids.csv",
                                 varchar_list=["RefereeName"],
                                 Primary_key="RefereeID"
                                 )

    create_table_and_upload_data(connection=conn,
                                 cursor=curs,
                                 table_name="clubs",
                                 csv_file_path="../DATA/teams.csv",
                                 varchar_list=["ClubName"],
                                 Primary_key="ClubID"
                                 )

if __name__ == "__main__":
    main()


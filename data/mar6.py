import random
import mysql.connector

def main():
    connection = mysql.connector.connect(user='pouder0', password='sewanee',
                                host='warren.sewanee.edu',
                                database='pouder0')

    inputfile = open("mar6_data.csv", "r")

    for line in inputfile:
        line = line.strip()       # this strips the newline character at the end of the line
        list_of_things = line.split(',');  # now the line of text is stored in an array 
        x = list_of_things[0]     # now x is the 0th element of the list
        y = list_of_things[1]     # y is the 1th element
        query = f"INSERT INTO fav_animals SET fav_animal='{x}', lucky_number={y};"
        cursor = connection.cursor()
        cursor.execute(query)
        connection.commit()
        cursor.close()
    inputfile.close()
    connection.close()

main()


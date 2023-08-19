import mysql.connector

def main():
    connection = mysql.connector.connect(user='pouder0', password="Ebrain@0909",
                                host='warren.sewanee.edu',
                                database='pouder0')

    with open ("fight_songs.txt", "r") as inputfile:
        '''first and second query are to create a table'''

        #first query
        line = inputfile.readline() #store the first line as a String
        colm_list = line.rstrip().split("\t") #converts the line as a list of columns. rstrip strips out the \n character and split separates the elements in the string by \t
        query = "CREATE TABLE IF NOT EXISTS fight_songs ("
        for colm in colm_list:
            query += colm + " INT,"
        query = query[:-1] + ")"
        cursor = connection.cursor()
        cursor.execute(query)

        # second query
        var_cols = ['school', 'conference', 'song_name', 'writers', 'spotify_id']
        query = "ALTER TABLE fight_songs "
        for col in var_cols:
            query += "MODIFY COLUMN " + col + " VARCHAR(255),"
        query = query[:-1]
        cursor.execute(query)

        '''Following queries are to insert the data into the table'''
        query = "INSERT INTO fight_songs("
        for colm in colm_list:
            query += colm + ","
        query = query[:-1] + ")"

        query += " VALUES "

        data_to_insert = inputfile.readlines()
        for line in data_to_insert:
            data = line.rstrip().split("\t")
            for i in range(len(data) -1):
                if  data[i].isdigit():
                    data[i] = int(data[i])
                if data[i] == "Yes":
                    data[i] = 1
                if data[i] == "No":
                    data[i] = 0
            data = str(tuple(data))
            query += data + ","
        query = query[:-1]
        cursor.execute(query)
        connection.commit()
        cursor.close()
        connection.close()


if __name__ == "__main__":
    main()


#Q1 query:
# select school, number_fights/sec_duration as fights_per_second from fight_songs order by 2 desc limit 1;

#Q2 query:
#  select conference, round(avg(bpm), 2) as avgbpm from fight_songs group by 1 order by 2 desc;


4a.

```sql
SELECT SUBJECT, COUNT(title) AS num_intro
FROM class_schedule
WHERE title LIKE "%introductory%" OR title LIKE "%introduction%"
GROUP BY 1; 

```

4b.

```sql
SELECT professor, COUNT(subject) AS num_classes, ROUND(AVG(num_students), 1) AS avg_class_size 
FROM class_schedule 
GROUP BY professor 
HAVING COUNT(subject) >= 3 
ORDER BY avg_class_size DESC
LIMIT 10;
```

4c.

```sql
SELECT DATE_FORMAT(match_time, '%a %b %d') AS day_of_match, 
       p1.display_name as human,
       p2.display_name as bot
FROM rps_matches as m, rps_players as p1, rps_players as p2
WHERE m.player_1_id = p1.player_id AND
      m.player_2_id = p2.player_id AND
      player_1_throw = 's' AND 
      player_2_throw = 's' AND
      is_tie = 1 
ORDER BY match_time desc
LIMIT 10;
```

4d.

```sql
SELECT  city_name,
        GROUP_CONCAT(CONCAT(state_name, '(', city_population, ')') ORDER BY city_population DESC SEPARATOR ', ' ) as states,
        SUM(city_population) as total_pop
FROM cities
GROUP BY city_name
HAVING COUNT(DISTINCT state_name) > 1
ORDER BY total_pop DESC;
```

4e.

```sql
SELECT city as office,
       COUNT(*) as num_employees
FROM retailer_employees as e, retailer_offices as o
WHERE e.officeCode = o.officeCode
GROUP BY o.city
ORDER BY 2 DESC;
```
4f.

```sql
SELECT  c.customerName,
        p.productName,
        od.orderNumber,
        od.quantityOrdered
FROM retailer_orders as o, retailer_orderdetails as od, retailer_customers as c, retailer_products as p
WHERE o.orderNumber = od.orderNumber AND
      o.customerNumber = c.customerNumber AND
      od.productCode = p.productCode AND
      p.productName LIKE "%Harley Davidson%" AND
      od.quantityOrdered >= 50;
```
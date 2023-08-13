## Roshan Poudel
**March 1 Stuff**


2.


```sql
select
    CountryCode as countrycode,
    District as district,
    count(distinct Name) as cities_in_this_district

from
    world_x_city

group by 1, 2

order by 3 desc;
```

3.


```sql
select 
    Language as language,
    count(CountryCode) as num_countries

from
    world_x_country_language as lang

where IsOfficial = "T"
group by language
order by num_countries desc
limit 6;
```

4.


```sql
select
    Code as country_code,
    Name as country_name
from
    world_x_country
where
    left(Code, 1) != left(Name, 1);
```

5.


```sql
select
    country.Name as country_name,
    language.Language as official_language
from
    world_x_country as country,
    world_x_country_language as language
where
    country.Code = language.CountryCode
    and language.IsOfficial = 'T'
order by 2;
```
6.


```sql
select 
    c.Name as country_name,
    group_concat(l.Language SEPARATOR ', ') as languages_with_over_40_pct

from 
    world_x_country as c,
    world_x_country_language as l

where
    c.Code = l.CountryCode
    and l.Percentage > 40

group by country_name

having count(distinct language) >= 2
order by 1;
```

7.


```sql
SELECT 
    c.Name AS country_name,
    GROUP_CONCAT(l.Language, ' (', l.Percentage, ')' SEPARATOR ', ') AS languages_with_over_40_pct
FROM 
    world_x_country AS c
JOIN 
    world_x_country_language AS l 
ON 
    c.Code = l.CountryCode AND l.Percentage > 40
GROUP BY 
    country_name
HAVING 
    COUNT(DISTINCT l.Language) >= 2;
ORDER BY
    1;
```

8.


```sql
SELECT
    ct.Name as capital_city,
    c.Name as country
FROM
    world_x_city AS ct
JOIN
    world_x_country AS c
ON
    ct.ID = c.Capital
GROUP BY 1
ORDER BY 1;
```

9.


```sql
SELECT
    ct.Name AS capital_city,
    c.Name AS country
FROM
    world_x_city AS ct
JOIN
    world_x_country AS c
ON
    ct.ID = c.Capital
JOIN
    world_x_country_language AS l
ON
    c.Code = l.CountryCode AND l.Language = "French" AND l.IsOfficial = 'T'
GROUP BY 1
ORDER BY 1;
```

10.


```sql
SELECT
    c.Name AS country,
    l1.Language AS official_language,
    l1.Percentage AS percentage,
    GROUP_CONCAT(l2.Language, ' (', l2.Percentage, ')' SEPARATOR ',') AS other_languages
FROM
    world_x_country AS c
JOIN
    world_x_country_language AS l1
ON
    c.Code = l1.CountryCode AND
    l1.IsOfficial = 'T'
JOIN
    world_x_country_language AS l2
ON
    c.Code = l2.CountryCode AND
    l2.IsOfficial = 'F' AND
    l2.Percentage > l1.Percentage

GROUP BY 1
ORDER BY 1;
```
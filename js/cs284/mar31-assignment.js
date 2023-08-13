
document.write("<table>");

document.write("<tr>");
document.write("<td> </td>");
for (i = 1; i <= 10; i++){
    document.write("<td>" + i + "</td>");
}
document.write("</tr>");

for (row = 1; row <= 50; row++){
    document.write("<tr>");
    document.write("<td>" + row + "</td>");
    for (col = 1; col<= 10; col++){
        num = col + (row-1) * 10;
        document.write("<td>");
        document.write(num);
        document.write("</td>");
    }
    document.write("</tr>");
}
document.write("</table>");

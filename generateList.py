#!/usr/bin/python3
f = open('types', 'r')
output = ""
i = 1
for line in f:
    line = line.strip()
    output += "<a href=\"?category="+line+"\" class=\"list-group-item\">"+line+"</a>\n"
print(output)
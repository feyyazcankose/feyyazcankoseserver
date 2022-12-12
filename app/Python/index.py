import sys
import json

import requests
from bs4 import BeautifulSoup
search = "python"
page = requests.get("https://www.google.com/search?q="+search)
soup = BeautifulSoup(page.text, "html.parser")
print(page.text)
# print(
search = soup.find("div", {"id": "main"})
firstParameter = "/url?q="
endParameter = "/&sa="
links = []
# print(search)
if search != None:
    tags = search.findAll("a")
    for tag in tags:
        href = tag["href"]
        if firstParameter in href and endParameter in href:
            links.append(href.split(firstParameter)[1].split(endParameter)[0])



response = [{
    "links":links
}]


print(json.dumps(response))

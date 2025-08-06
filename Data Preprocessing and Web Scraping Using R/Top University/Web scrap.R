#Web Scraping
library(rvest)



uniDetails <- read_html("https://cwur.org/2022-23.php")



rank <- html_text(html_nodes(uniDetails,"td:nth-child(1)"))
rank



institution <- html_text(html_nodes(uniDetails,"#cwurTable a:nth-child(1)"))
institution



location <- html_text(html_nodes(uniDetails,"td:nth-child(3)"))
location



national_rank <- html_text(html_nodes(uniDetails,"td:nth-child(4)"))
national_rank

edu_rank<- html_text(html_nodes(uniDetails,"td:nth-child(5)"))
edu_rank

emp_rank <- html_text(html_nodes(uniDetails,"td:nth-child(6)"))
emp_rank

faculty_rank <- html_text(html_nodes(uniDetails,"td:nth-child(7)"))
faculty_rank



research_rank <- html_text(html_nodes(uniDetails,"td:nth-child(8)"))
research_rank

score <- html_text(html_nodes(uniDetails,"td:nth-child(9)"))
score



#Creating Dataframe



TopUniversityDetails <- data.frame(rank,institution,location, national_rank, edu_rank, emp_rank, faculty_rank, research_rank, score)
TopUniversityDetails



#Export the dataframe
TopUniversityDetails1 <- read.csv("D:\\12th\\Introduction to Data Science\\Final project\\TopUniversityDetails.csv")
print(TopUniversityDetails)
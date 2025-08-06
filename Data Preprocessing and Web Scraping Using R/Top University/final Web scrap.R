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

#Handling missing data

TopUniversityDetails1 <- TopUniversityDetails
TopUniversityDetails1[!apply(TopUniversityDetails1 == "" ,1,all),]
TopUniversityDetails1
View(TopUniversityDetails1)


#Data transformation

TopUniversityDetails1$score =
  as.numeric(format(round(TopUniversityDetails1$score, 0)))
print(TopUniversityDetails1)

#Data reduction

TopUniversityDetails1 <- TopUniversityDetails1[-c(35, 37, 47, 51, 55, 61, 62, 63, 72, 74, 80, 85, 96,  97, 98, 100, 101, 102, 109, 111, 118, 119, 123, 128, 129, 130, 132, 133, 137, 138, 148, 149, 150, 154, 155, 158, 161, 163, 164, 166, 168, 169, 170, 171, 175, 179, 180, 181, 183, 184, 185, 189, 190, 191, 192, 194, 195, 197, 201, 203, 204, 206, 207, 208, 211, 213, 215, 216, 217, 219, 220, 223, 226, 228, 229, 230, 231, 232, 234, 236, 237,238, 239, 240, 241, 242, 244, 246, 248, 249, 250, 251, 252, 253, 254, 255, 256, 257, 258, 259, 260, 261, 262, 263, 264, 265, 266, 267, 268, 269, 270, 272, 273, 274, 275, 276, 278, 279, 282, 284, 285, 286, 287, 288, 289, 290, 291, 292, 293, 294, 295, 297, 298, 300, 301, 302, 305,306, 307, 308, 309, 310, 311, 312, 313, 314, 315, 316, 317, 318, 319, 321,322, 323), ]
print(TopUniversityDetails1)

#Descriptive Statistics:
#Mean:

mean(TopUniversityDetails1$score)

#Median:
median(TopUniversityDetails1$rank)

colnames(TopUniversityDetails1)[9] = "education_rank"

#Range:

max(TopUniversityDetails1$score)- min(TopUniversityDetails1$score)

#Quantile:

quantile(TopUniversityDetails1$education_rank)

#Data visualization:

library(ggplot2)
ggplot(TopUniversityDetails1, aes(x=national_rank, y= edu_rank)) + geom_point(fill="blue", color="red") + 
  
  labs(title="Simple Bar chart", 
       x="national_rank ", 
       y="edu_rank")

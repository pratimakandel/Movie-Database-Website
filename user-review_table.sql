
 create table user(
 user_id int not null auto_increment primary key,
 password varchar(100) not null,
 username varchar(100) not null
 );

create table review(
    user_id int not null,
    movie_id int nou null,
    review varchar(800),
    rating int(10),

    foreign key (user_id) references user(user_id),
    foreign key (movie_id) references movies(movie_id)
);



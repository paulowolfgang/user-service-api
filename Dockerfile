FROM wyveo/nginx-php-fpm:php80

COPY . /usr/share/nginx/html
COPY nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /usr/share/nginx/html

RUN apt update; \
    apt install vim -y

EXPOSE 80

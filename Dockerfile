FROM ubuntu
FROM mysql

RUN apt-get update && apt-get install apache2 php libapache2-mod-php php-mcrypt php-mysql -y

RUN a2enmod rewrite

ENV INSTALL_PATH /var/www/html/mystyle/

WORKDIR $INSTALL_PATH

RUN mv /etc/apache2/sites-enabled/000-default.conf /etc/apache2/sites-enabled/000-default-bkp

COPY . .

ADD config/000-default.conf /etc/apache2/sites-enabled/

EXPOSE 80

CMD apachectl -D FOREGROUND
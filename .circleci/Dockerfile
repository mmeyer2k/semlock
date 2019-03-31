FROM circleci/php:7.0

USER root

RUN apt-get -y update

# use bash instead
RUN rm /bin/sh && ln -sfv /bin/bash /bin/sh

# install pdo driver for mysql
RUN docker-php-ext-install sysvsem

CMD ["/bin/bash"]

FROM docker.io/library/mariadb:10.11

COPY ./appointment.sql /docker-entrypoint-initdb.d/

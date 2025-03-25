# Usar una imagen base de PHP con Apache
FROM php:8.2-apache


# Habilitar extensiones de PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql


# Configurar Apache para escuchar en el puerto 8080
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's/80/8080/g' /etc/apache2/ports.conf


# Copiar el código de la aplicación al contenedor
COPY ./ /var/www/html

# Establecer permisos para el directorio de la aplicación
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80 (HTTP)
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]
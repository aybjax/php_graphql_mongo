FROM nginx:1.19-alpine
WORKDIR /app
COPY ./conf/nginx.conf /etc/nginx/nginx.conf
# COPY ./app .
EXPOSE 80
The application was launched via docker
Basic routes remained unchanged

There are 3 routes available in the new module:
1 /logger/logger/log, use default logger via email
2 /logger/logger/log-to?type=file, use logger from variable "type"
3 /logger/logger/log-to-all send message for all existing loggers.

Loggers:
1 Email
2 File
3 Database
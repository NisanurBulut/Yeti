## Give a Star! :star:
If you like or are using this project to learn or start your solution, please give it a star. Thanks!
<hr>

### YETİ

Yeti is a demand tracking application. Users open requests about applications. Admin users meet these demands. The main element of the application is the demands. Side items are applications and users. The movements arising from these elements are presented graphically on the dashboard screen.It is not possible to become a member of the application. therefore, an admin user must add you to the application to be able to use the application.

* Only admin users have full authority over the application.

Non-admin users, other users, can only see their own demands and take action. Applications and users cannot see their screens.

Written on the basis of the MVC (Model-Viewv-Controller) design pattern using modern PHP language. MSQL-MariaDB is used as database. In practice, no ready-made library or ORM tool is used for database operations. Migration processes are based on filing and raw SQL queries are executed. In the application, one-step sql queries such as where, update, insert into, select are defined as generic.However, a store procedure is used for queries that contain join. In the application, only the raw SQL query was written in the migration steps.

* By imitating Laravel Framework, we tried to prepare custom Laravel Framework.

| Developing       | Tool           |
|------------------|----------------|
| Graphics         | HighCharts     |
| Theme Components | Semantic UI    |
| Javascript       | Jquery         |
| Datatables       | Datatables.net |
|                  |                |
| Database         | MariaDB        |
| Backend          | Modern PHP     |

* While developing the application, it tried to comply with the principles of SOLID KISSS and DRY.
- Static classes are derived for fixed objects.
  Used stored procedures  and the constant data filling the dropdopwn list are kept in the Constant class.
- Making abstraction between classes that are related to each other.
  Each database model is derived from the DbModel class.Thus, each model has been able to call DbModel methods as they wish, and each model must have tableName, primaryKey .. methods.

![Yeti](https://github.com/NisanurBulut/Yeti/blob/master/Trailers/Trailer_Yeti.gif)
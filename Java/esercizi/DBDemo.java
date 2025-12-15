import java.sql.*;

public class DBDemo {
  public static void main(String[] args) throws SQLException, ClassNotFoundException {
    // Load the JDBC driver
    Class.forName("org.mariadb.jdbc.Driver");
    System.out.println("Driver loaded");

    // Try to connect
    Connection connection = DriverManager.getConnection
      ("jdbc:mariadb://localhost/test", "user", "password");

    System.out.println("It works!");

    connection.close();
  }
}

/*
* https://wiki.archlinux.org/title/JDBC_and_MySQL
* $ javac DBDemo.java
* $ java -classpath /usr/share/java/mariadb-jdbc/mariadb-java-client.jar:. DBDemo
*/
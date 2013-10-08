<%@ page contentType="application/xml" pageEncoding="UTF-8"%>
<?xml version="1.0" encoding="UTF-8"?>
<error>
    <status><%=request.getAttribute("javax.servlet.error.status_code") %></status>
    <message><%=request.getAttribute("javax.servlet.error.message") %></message>
</error>
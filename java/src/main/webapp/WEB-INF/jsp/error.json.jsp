<%@ page contentType="application/json" pageEncoding="UTF-8"%>
{"error":[
   status:<%=request.getAttribute("javax.servlet.error.status_code") %>,
   message:<%=request.getAttribute("javax.servlet.error.message") %>
]}
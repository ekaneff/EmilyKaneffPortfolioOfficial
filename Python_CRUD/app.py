from flask import Flask
import mysql.connector
from flask import render_template
from flask import request
from flask import redirect

app = Flask(__name__)
app.config['DEBUG'] = True

@app.route("/")
def hello():
    return redirect("/list")

@app.route("/list")
def list():
	cnx = mysql.connector.connect(user='root',password='root',database='fruits')
	cursor = cnx.cursor(buffered=True)
	select = ("select * from fruit_table")
	cursor.execute(select)
	data = cursor.fetchall()
	return render_template("list.html", data=data)

@app.route("/form")
def form():
	return render_template("form.html")

@app.route("/addaction", methods=['POST', 'GET'])
def addaction():
	if request.method == 'POST':
		cnx = mysql.connector.connect(user='root',password='root',database='fruits')
		cursor = cnx.cursor(buffered=True)
		insert = ("INSERT INTO fruit_table (name) VALUES (%s)")
		cursor.execute(insert, (request.form['username'],)) #make sure you pass extra blank parameter
		cnx.commit()
		cnx.close()
		return redirect("/list")

@app.route("/editform/<id>")
def editform(id):
	cnx = mysql.connector.connect(user='root',password='root',database='fruits')
	cursor = cnx.cursor(buffered=True)
	select = ("select * from fruit_table where id=" + id)
	cursor.execute(select)
	data = cursor.fetchone()
	return render_template("editform.html",data=data)
		
@app.route("/delete/<id>")
def delete(id):
	cnx = mysql.connector.connect(user='root',password='root',database='fruits')
	cursor = cnx.cursor(buffered=True)
	delete = ("delete from fruit_table where id = " + id)
	cursor.execute(delete)
	cnx.commit()
	cnx.close()
	return redirect("/list")

@app.route("/update/<id>", methods=['POST', 'GET'])
def update(id):
	cnx = mysql.connector.connect(user='root',password='root',database='fruits')
	cursor = cnx.cursor(buffered=True)
	update = ("update fruit_table set name = %s where id = " + id)
	cursor.execute(update, (request.form['username'],))
	cnx.commit()
	cnx.close()
	return redirect("/list")

if __name__ == "__main__":
    app.run()
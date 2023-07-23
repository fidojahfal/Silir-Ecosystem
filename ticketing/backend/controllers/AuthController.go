package controllers

import (
	"encoding/json"
	"io/ioutil"
	"net/http"
	"silirapi/models"
	"strings"

	"github.com/gin-gonic/gin"
)

func IsAuth(c *gin.Context) bool {
	var client = &http.Client{}

	req, err := http.NewRequest("GET", "http://localhost:7777/api/auth/user-profile", nil)
	if err != nil {
		return false
	}
	req.Header.Set("Authorization", "bearer "+strings.Split(c.Request.Header["Authorization"][0], " ")[1])
	response, err := client.Do(req)
	if err != nil {
		return false
	}
	resBody, _ := ioutil.ReadAll(response.Body)
	var user models.User
	err = json.Unmarshal(resBody, &user)
	if response.StatusCode != 200 {
		return false
	}
	defer response.Body.Close()
	return true
}

func IsAdmin(c *gin.Context) bool {
	var client = &http.Client{}

	req, err := http.NewRequest("GET", "http://localhost:7777/api/auth/user-profile", nil)
	if err != nil {
		return false
	}
	req.Header.Set("Authorization", "bearer "+strings.Split(c.Request.Header["Authorization"][0], " ")[1])
	response, err := client.Do(req)
	if err != nil {
		return false
	}
	resBody, _ := ioutil.ReadAll(response.Body)
	var user models.User
	err = json.Unmarshal(resBody, &user)
	if response.StatusCode != 200 {
		return false
	}
	if user.Role != "admin" {
		return false
	}
	defer response.Body.Close()
	return true
}

func GetUser(c *gin.Context) (*models.User, error) {
	var client = &http.Client{}

	req, err := http.NewRequest("GET", "http://localhost:7777/api/auth/user-profile", nil)
	if err != nil {
		return nil, err
	}
	req.Header.Set("Authorization", "bearer "+strings.Split(c.Request.Header["Authorization"][0], " ")[1])
	response, err := client.Do(req)
	if err != nil {
		return nil, err
	}
	resBody, _ := ioutil.ReadAll(response.Body)
	user := new(models.User)
	err = json.Unmarshal(resBody, &user)
	if response.StatusCode != 200 {
		return nil, err
	}
	defer response.Body.Close()
	return user, nil
}

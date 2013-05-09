package com.example.finallab;

public class Hotel {
	private String nom;
	private String adresse;
	private String tel;
	private String description;
	private String prix;
	
	public Hotel (String nom, String adr, String tel, String descr, String prix){
		this.nom = nom;
		this.adresse = adr;
		this.tel = tel;
		this.description = descr;
		this.prix = prix;
	}

	public String getNom() {
		return nom;
	}

	public void setNom(String nom) {
		this.nom = nom;
	}

	public String getAdresse() {
		return adresse;
	}

	public void setAdresse(String adresse) {
		this.adresse = adresse;
	}

	public String getTel() {
		return tel;
	}

	public void setTel(String tel) {
		this.tel = tel;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public String getPrix() {
		return prix;
	}

	public void setPrix(String prix) {
		this.prix = prix;
	}
	
}

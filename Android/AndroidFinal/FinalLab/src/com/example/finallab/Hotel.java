package com.example.finallab;

public class Hotel {
	private String nom;
	private String adresse;
	private String tel;
	private String description;
	private int prix;
	
	public Hotel (String nom, String adr, String tel, String descr, int prix){
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

	public int getPrix() {
		return prix;
	}

	public void setPrix(int prix) {
		this.prix = prix;
	}
	
}

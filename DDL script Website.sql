
create database website
use Website
drop table if exists posts
drop table if exists videos
drop table if exists topic
drop table if exists users

create table users(
Username varchar(50) not null,
Password varchar(100) not null,
dob date null,
gender char(1) null,
constraint PK_Users primary key (Username)
)

insert into users(Username,Password) values
('Bassie','$2y$10$oU0mNRQlqzh2h5FH1l2l7usELpShB60XK9aONeqs.H.2wwbSH15ea'),
('Wout','$2y$10$iaqzGX3hP.vmmx/uwIVe8.698I7ci8lBmV9QuH5.NhfNnYy601FUi')


create table topic(
topic_id numeric not null,
topic_name varchar(50) not null,
constraint PK_TOPIC primary key (topic_id)
)

insert into topic (topic_id,topic_name) values
(1,'Nieuw: Het forum'),
(2,'Ghoul Problems'),
(3,'Brotherhood Of Steel: Planning'),
(4,'Offtopic'),
(5,'Farming')


CREATE TABLE [dbo].[posts](
	[post_id] [numeric](18, 0) NOT NULL,
	[topic_id] [numeric](18, 0) NOT NULL,
	[Username] [varchar](50) NOT NULL,
	[post_date] [date] NOT NULL,
	[post_content] [varchar](5000) NOT NULL,
 CONSTRAINT [PK_posts] PRIMARY KEY CLUSTERED 
(
	[post_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(1 AS Numeric(18, 0)), CAST(1 AS Numeric(18, 0)), N'Wout', CAST(N'2019-01-18' AS Date), N'We hebben een nieuw forum toegevoegd aan de website.<br/>
Deze is helemaal werkend. In de bijdrage box hieronder kun je een bericht toevoegen als je ingelogd bent.<br/>
Ook kunnen er topics toegevoegd worden.<br/><br/>
Have fun!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(2 AS Numeric(18, 0)), CAST(1 AS Numeric(18, 0)), N'Bassie', CAST(N'2019-01-18' AS Date), N'Wow vet cool man!<br/><br/>
Nu is de site nog cooler dan eerst!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(3 AS Numeric(18, 0)), CAST(2 AS Numeric(18, 0)), N'Feral Ghoul', CAST(N'2019-01-18' AS Date), N'Weet iemand waarom mijn huid ineens zo uitgedroogd voelt?<br/><br/>
Ook voel ik een vreemde drang om andere wezens aan te vallen ')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(4 AS Numeric(18, 0)), CAST(2 AS Numeric(18, 0)), N'Ghoul over 9000', CAST(N'2019-01-18' AS Date), N'Ja ik heb dat gekregen toen ik niet werd binnen gelaten in jullie vault!<br/><br/>
Stomme Vault-tec!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(5 AS Numeric(18, 0)), CAST(2 AS Numeric(18, 0)), N'Overseer', CAST(N'2019-01-18' AS Date), N'H�! Er kunnen gewoon niet meer mensen bij ok�? dat is niet ons probleem!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(6 AS Numeric(18, 0)), CAST(3 AS Numeric(18, 0)), N'Paladin Danse', CAST(N'2019-01-18' AS Date), N'Hallo allemaal!<br>
Vandaag post ik de eerste planning van de plannen van de Brotherhood Of Steel!<br>
Voorals nog ziet onze planning er zo uit:<br>
<br>
2200: Capital Wasteland overnemen<br>
2270: Commonwealth opruimen<br>
2277: Institute uit de weg ruimen<br>
<br>
De planning kan veranderd worden als dit nodig is.<br>')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(7 AS Numeric(18, 0)), CAST(2 AS Numeric(18, 0)), N'Goelie', CAST(N'2019-01-18' AS Date), N'Ik had laatst toch zoveel zin in vlees. Hebben jullie dat ook wel eens?')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(8 AS Numeric(18, 0)), CAST(4 AS Numeric(18, 0)), N'Mysterious Stranger', CAST(N'2019-01-18' AS Date), N'Sinds mijn vader weg is hou ik toch zo veel van gitaar spelen!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(9 AS Numeric(18, 0)), CAST(3 AS Numeric(18, 0)), N'Proctor Ingram', CAST(N'2019-01-18' AS Date), N'Ik ga alvast mijn Power Armor wassen!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(10 AS Numeric(18, 0)), CAST(1 AS Numeric(18, 0)), N'Proctor Ingram', CAST(N'2019-01-18' AS Date), N'Wow nu hebben we eindelijk een plek om als Brotherhood of Steel samen te praten!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(11 AS Numeric(18, 0)), CAST(4 AS Numeric(18, 0)), N'Proctor Ingram', CAST(N'2019-01-18' AS Date), N'Vinden jullie het ook zo irritant dat je met Power Armor aan niet aan je hoofd kan krabben?')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(12 AS Numeric(18, 0)), CAST(1 AS Numeric(18, 0)), N'Preston Garvey', CAST(N'2019-01-18' AS Date), N'Join nu de Minutemen!<br>
<br>
Wordt je lastig gevallen door Ghouls, Raiders, of Mirelurks?<br>
<br>
De Minutemen staan paraat!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(13 AS Numeric(18, 0)), CAST(4 AS Numeric(18, 0)), N'Preston Garvey', CAST(N'2019-01-18' AS Date), N'Altijd als ik de wacht houd valt mijn hoed altijd scheef en kan ik niks meer zien.<br>
<br>
Heeft iemand misschien een oplossing daar voor?')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(14 AS Numeric(18, 0)), CAST(4 AS Numeric(18, 0)), N'Wesley', CAST(N'2019-01-18' AS Date), N'Weet iemand misschien waar ik Fallout 4 goedkoop kan kopen?')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(15 AS Numeric(18, 0)), CAST(5 AS Numeric(18, 0)), N'Farmer', CAST(N'2019-01-18' AS Date), N'Laatst had ik zo''n groot mutfruit!<br>
<br>
Mijn hele gezin kon er een hap van nemen!<br>
We hadden niet eens meer honger!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(16 AS Numeric(18, 0)), CAST(5 AS Numeric(18, 0)), N'Farmer', CAST(N'2019-01-17' AS Date), N'Ik vind het wel zielig voor de mensen in het zuiden van de Commonwealth alle monsters zijn daar veel gevaarlijker.')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(17 AS Numeric(18, 0)), CAST(5 AS Numeric(18, 0)), N'Farmer', CAST(N'2019-01-19' AS Date), N'Wilt iemand corn ruilen voor mutfruits? ik heb het nodig voor mijn vegetable starch.')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(18 AS Numeric(18, 0)), CAST(5 AS Numeric(18, 0)), N'Supervisor Greene', CAST(N'2019-01-18' AS Date), N'Kom naar Greygarden als je je mutfruit wil verkopen!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(19 AS Numeric(18, 0)), CAST(2 AS Numeric(18, 0)), N'Supervisor Greene', CAST(N'2019-01-18' AS Date), N'Vinden jullie ghouls ook zo''n lelijk gezicht?')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(20 AS Numeric(18, 0)), CAST(3 AS Numeric(18, 0)), N'Supervisor Greene', CAST(N'2019-01-18' AS Date), N'Als je caps wil voor mutfruit kom dan naar Greygarden!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(21 AS Numeric(18, 0)), CAST(3 AS Numeric(18, 0)), N'Preston Garvey', CAST(N'2019-01-18' AS Date), N'Als de mensen maar beschermd blijven!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(22 AS Numeric(18, 0)), CAST(4 AS Numeric(18, 0)), N'Preston Garvey', CAST(N'2019-01-18' AS Date), N'Er is weer een settlement dat hulp nodig heeft. Wil iemand komen helpen?')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(23 AS Numeric(18, 0)), CAST(3 AS Numeric(18, 0)), N'Father', CAST(N'2019-01-18' AS Date), N'Wij doen er alles aan om de Commonwealth te helpen! Werk ons niet tegen of jullie zullen je einde tegemoet komen!')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(24 AS Numeric(18, 0)), CAST(4 AS Numeric(18, 0)), N'Father', CAST(N'2019-01-18' AS Date), N'Hoe overtuig ik mijn ouder dat ik een goed kind ben?')
GO
INSERT [dbo].[posts] ([post_id], [topic_id], [Username], [post_date], [post_content]) VALUES (CAST(25 AS Numeric(18, 0)), CAST(1 AS Numeric(18, 0)), N'Father', CAST(N'2019-01-18' AS Date), N'De laatste tijd verlangde ik wel naar een plek om mijn hart te luchten.<br>
<br>
Ik dank jullie voor deze geweldige plek')
GO
ALTER TABLE [dbo].[posts]  WITH CHECK ADD  CONSTRAINT [FK_POSTS_REF_TOPIC] FOREIGN KEY([topic_id])
REFERENCES [dbo].[topic] ([topic_id])
ON UPDATE Cascade ON DELETE Cascade
GO
ALTER TABLE [dbo].[posts] CHECK CONSTRAINT [FK_POSTS_REF_TOPIC]
GO


create table videos(
video_id numeric not null,
video_url varchar(50) not null,
video_name varchar(50) not null,
video_discription varchar(1000) null
constraint PK_VIDEO primary key (video_id)
)

delete videos

insert into videos (video_id,video_url,video_name,video_discription) values
(0, 'https://www.youtube.com/embed/Yuo7AuDGNN8' ,'Strenght','Following total atomic annihilation, the rebuilding of this great nation of ours may fall to you. That�s why Vault-Tec has prepared this educational video series for you to better understand the seven defining attributes that make you S.P.E.C.I.A.L.!<br>
Today we�ve released the first video in the series � starting, of course, with Strength. Study it carefully to ensure your survival and to discover what makes you S.P.E.C.I.A.L.' ),
(1,'https://www.youtube.com/embed/Vw21X2jKwCM','Perception','Following total atomic annihilation, the rebuilding of this great nation of ours may fall to you. That�s why Vault-Tec has prepared this educational video series for you to better understand the seven defining attributes that make you S.P.E.C.I.A.L.!<br>
This week�s S.P.E.C.I.A.L. video focuses on Perception. Study it carefully to ensure your survival and to discover what makes you S.P.E.C.I.A.L.'),
(2,'https://www.youtube.com/embed/paYU1neP3xM','Endurance','Following total atomic annihilation, the rebuilding of this great nation of ours may fall to you. That�s why Vault-Tec has prepared this educational video series for you to better understand the seven defining attributes that make you S.P.E.C.I.A.L.!<br>
 
This week�s S.P.E.C.I.A.L. video focuses on Endurance. Study it carefully to ensure your survival and to discover what makes you S.P.E.C.I.A.L.' ),
(3,'https://www.youtube.com/embed/X95lZ56ddj4','Charisma','Following total atomic annihilation, the rebuilding of this great nation of ours may fall to you. That�s why Vault-Tec has prepared this educational video series for you to better understand the seven defining attributes that make you S.P.E.C.I.A.L.!<br>

This week�s S.P.E.C.I.A.L. video focuses on Charisma. Study it carefully to ensure your survival and to discover what makes you S.P.E.C.I.A.L. '),
(4,'https://www.youtube.com/embed/H6yt-43Vp1M','Intelligence','Following total atomic annihilation, the rebuilding of this great nation of ours may fall to you. That�s why Vault-Tec has prepared this educational video series for you to better understand the seven defining attributes that make you S.P.E.C.I.A.L.!<br>
 
This week�s S.P.E.C.I.A.L. video focuses on Intelligence. Study it carefully to ensure your survival and to discover what makes you S.P.E.C.I.A.L. '),
(5,'https://www.youtube.com/embed/bQ_okO2tLN0','Agility','Following total atomic annihilation, the rebuilding of this great nation of ours may fall to you. That�s why Vault-Tec has prepared this educational video series for you to better understand the seven defining attributes that make you S.P.E.C.I.A.L.!<br>
 
This week�s S.P.E.C.I.A.L. video focuses on Agility. Study it carefully to ensure your survival and to discover what makes you S.P.E.C.I.A.L.'),
(6,'https://www.youtube.com/embed/Bke9wvob8Ls','Luck','Following total atomic annihilation, the rebuilding of this great nation of ours may fall to you. That�s why Vault-Tec has prepared this educational video series for you to better understand the seven defining attributes that make you S.P.E.C.I.A.L.!<br>
 
This week�s S.P.E.C.I.A.L. video focuses on Luck.  Study it carefully to ensure your survival and to discover what makes you S.P.E.C.I.A.L.' ),

(7,'https://www.youtube.com/embed/ofeY9pNFXFU','Vault-tec','There�s almost 50 vaults known in the Fallout Universe, each with their own story, and they were all created by the mysterious company known as Vault-Tec. Vault-Tec, while fronting as an organization with the preservation of humanity as its heart, had more sinister, ulterior motives. Learn now the history of Vault-Tec, the Vaults, and the worst of the worst vault experiements done by these despicable people.'),

(8,'https://www.youtube.com/embed/CxUSmJInmpY','Vault-Tec Headquarters','The Full Story of Vault-Tec Regional Headquarters in Fallout 4'),
(9,'https://www.youtube.com/embed/cco_DvSzrts','Vault Tec Commercial','Vault Tec Commercial from Fallout 3'),
(10,'https://www.youtube.com/embed/xhHIxSjm-CI','Where is Vault Tec',' I�m pretty
curious as to whether Vault-tec is still around during the events of all of the Fallout games and whether they still monitor any of the vaults.<br> In this video, I will attempt to answer those questions.'),
(11,'https://www.youtube.com/embed/M9FGaan35s0','Fallout 76 � Official Trailer','Bethesda Game Studios, the award-winning creators of Skyrim and Fallout 4, welcome you to Fallout 76, the online prequel where every surviving human is a real person. Work together, or not, to survive. '),
(12,'https://www.youtube.com/embed/GE2BkLqMef4','Fallout 4 - Official Trailer','Watch the official in-game trailer for Fallout 4 � the next generation of open-world gaming from the award-winning creators of Fallout 3 and The Elder Scrolls V'),
(13,'https://www.youtube.com/embed/iYZpR51XgW0','Fallout 3 Trailer','Latest trailer for Bethesda�s Fallout 3'),
(14,'https://www.youtube.com/embed/l-x-1fm2cq8','Fallout: New Vegas Trailer','Check out the latest Fallout New Vegas Trailer'),
(15,'https://www.youtube.com/embed/XwjCTjdDyvw','Old World Blues DLC Trailer','The newest DLC for Fallout New Vegas is coming in Old World Blues'),
(16,'https://www.youtube.com/embed/WY_jmr7pJyw','Dead Money DLC trailer','Here�s a trailer for Fallout: New Vegas first downloadable content, Dead Money.'),
(17,'https://www.youtube.com/embed/tsPwD6kqh7g','Lonesome Road DLC Trailer','Lonesome Road - The fourth add-on pack to arrive via Xbox LIVE, PlayStation Network and Steam.'),
(18,'https://www.youtube.com/embed/B0wSCFBJcSs','Far Harbor Official Trailer','Preview your journey to Far Harbor, the next game add-on for Fallout 4.'),
(19,'https://www.youtube.com/embed/X_TA1ZG-HLw','Nuka World DLC Trailer',
'Hop on the Nuka-Express for a trip to Nuka-World� America�s Favorite Vacation Destination!<br> The fun starts on Xbox One, PlayStation 4, and PC on Tuesday, August 30th.'),
(20,'https://www.youtube.com/embed/d8smtdSWPds','Automatron DLC Trailer','Fallout 4 DLC Trailer: Automatron is the first DLC for Fallout 4'),
(21,'https://www.youtube.com/embed/Yooin4piBPo','Vault-Tec Workshop DLC Trailer','Fallout 4 DLC trailer reveals Fallout 4 Vault-Tech Workshop, adding the ability to build your own Vault and experiment on Vault dwellers in Fallout 4'),
(22,'https://www.youtube.com/embed/MdviCfP8IMs','Broken Steel DLC Trailer','Hope you finished Fallout 3 by now, otherwise you should shy away from this latest trailer for Bethesda Broken Steel DLC expansion'),
(23,'https://www.youtube.com/embed/YUI-m1kth64','Point Lookout DLC Trailer','New Fallout 3 DLC is on it�s way and you�ve got the first look'),
(24,'https://www.youtube.com/embed/4enOSrf-MY8','Mothership Zeta DLC Trailer', 'Defy hostile alien abductors and fight your way off of the massive Mothership Zeta, orbiting Earth miles above the Capital Wasteland. Mothership Zeta takes Fallout 3 in an entirely new direction�outer space.')